<?php 
// Copyright (c) Isaac Gouy 2004, 2005

// LIBRARIES ////////////////////////////////////////////////

require_once(BLIB); 
require_once(LIB); 

// DATA ///////////////////////////////////////////


list($Incl,$Excl) = ReadIncludeExclude();
$Tests = ReadUniqueArrays('test.csv',$Incl);
uasort($Tests, 'CompareTestName');

$Langs = ReadUniqueArrays('lang.csv',$Incl);
uasort($Langs, 'CompareLangName');

if (isset($HTTP_GET_VARS['test'])){ $T = $HTTP_GET_VARS['test']; } 
else { $T = 'ackermann'; }

if (isset($HTTP_GET_VARS['lang'])){ $L = $HTTP_GET_VARS['lang']; } 
else { $L = 'all'; }

if (isset($HTTP_GET_VARS['lang2'])){ $L2 = $HTTP_GET_VARS['lang2']; } 
else { $L2 = $L; }

if (isset($HTTP_GET_VARS['id'])){ $I = $HTTP_GET_VARS['id']; } 
else { $I = 0; }

if (isset($HTTP_GET_VARS['sort'])){ $S = $HTTP_GET_VARS['sort']; } 
else { $S = 'fullcpu'; }


// PAGES ///////////////////////////////////////////////////
// There are 4 kinds of test/lang combination
// - all tests all languages - Scorecard
// - all tests one language  - Head to Head | Ranking
// - one test all languages  - Benchmark
// - one test one language   - Program

$Page = & new Template(LIB_PATH);
$Body = & new Template(LIB_PATH); 

if ($T=='all'){
   if ($L=='all'){    // Scorecard
  
      $Title = 'Overall Scores';
      $TemplateName = 'scorecard.tpl.php';

      $About = & new Template(ABOUT_PATH);
      $AboutTemplateName = 'scorecard-about.tpl.php'; 

      $Weights = $HTTP_GET_VARS;     
      unset($Weights['test'],$Weights['lang'],$Weights['lang2'],$Weights['id'],$Weights['sort']);
      $Body->set('W', $Weights);  

      $Body->set('Data', ScoreData(DATA_PATH.'data.csv', $Tests, $Langs, $Incl, $Excl)); 
      $metaRobots = '<meta name="robots" content="nofollow" /><meta name="robots" content="noarchive" />';


   } else {           // Head to Head 
  
      $LangName = $Langs[$L][LANG_FULL];    
      $Title = $LangName.' benchmarks'; 

      $TemplateName = 'headtohead.tpl.php';
      $About = & new Template(ABOUT_PATH);
      $AboutTemplateName = $L.SEPARATOR.'about.tpl.php';
      if (! file_exists(ABOUT_PATH.$AboutTemplateName)){ $AboutTemplateName = 'blank-about.tpl.php'; }
      $About->set('Version', HtmlFragment(ABOUT_PATH.$L.SEPARATOR.'version.php'));
      $Body->set('Data', HeadToHeadData(DATA_PATH.'ndata.csv',$Langs,$Incl,$Excl,$L,$L2));  
      $metaRobots = '<meta name="robots" content="nofollow" /><meta name="robots" content="noarchive" />';         
   }


/*
   } else {           // Ranking 
  
      $LangName = $Langs[$L][LANG_FULL];    
      $Title = $LangName.' benchmark rankings'; 

      $TemplateName = 'ranking.tpl.php';
      $About = & new Template(ABOUT_PATH);
      $AboutTemplateName = $L.SEPARATOR.'about.tpl.php';
      if (! file_exists(ABOUT_PATH.$AboutTemplateName)){ $AboutTemplateName = 'blank-about.tpl.php'; }
      $About->set('Version', HtmlFragment(ABOUT_PATH.$L.SEPARATOR.'version.php'));
      $Body->set('Rank', RankData(DATA_PATH.'data.csv', $Langs, $L, $Incl, $Excl));  
      $metaRobots = '<meta name="robots" content="nofollow" /><meta name="robots" content="noarchive" />';        
   }
*/   
   

} elseif ($L=='all'){ // Benchmark 

      $TestName = $Tests[$T][TEST_NAME];
      $Title = $TestName.' benchmark'; 
      $TemplateName = 'benchmark.tpl.php'; 

      $About = & new Template(ABOUT_PATH);
      $AboutTemplateName = $T.SEPARATOR.'about.tpl.php'; 
      if (! file_exists(ABOUT_PATH.$AboutTemplateName)){ $AboutTemplateName = 'blank-about.tpl.php'; }
      $Body->set('Data', ReadSelectedDataArrays(DATA_PATH.'data.csv', $T, $Incl) );
      $metaRobots = '<meta name="robots" content="nofollow" /><meta name="robots" content="noarchive" />';

} else {              // Program

      $TestName = $Tests[$T][TEST_NAME];
      $LangName = $Langs[$L][LANG_FULL];       
      $TemplateName = 'program.tpl.php';
      $Title = $TestName.' '.$LangName.IdName($I).' program';

      // NOTE Sometimes there's an alternative program for the benchmark test and language
      //      so we need to look for files with a particular Id, as-well-as test and language    

      $Id = '';
      if ($I > 0){ $Id = SEPARATOR.$I; }            
      $About = & new Template(ABOUT_PROGRAMS_PATH);
      $AboutTemplateName = $T.SEPARATOR.$L.$Id.SEPARATOR.'about.tpl.php'; 
      if (! file_exists(ABOUT_PROGRAMS_PATH.$AboutTemplateName)){ $AboutTemplateName = 'blank-about.tpl.php'; }

      $Body->set('Data', ReadSelectedDataArrays(DATA_PATH.'data.csv', $T, $Incl) );      
      $Body->set('Code', HtmlFragment( CODE_PATH.$T.SEPARATOR.$L.$Id.'.code' ));    
      $Body->set('Log', HtmlFragment( LOG_PATH.$T.SEPARATOR.$L.$Id.'.log' ));
      $Body->set('Id', $I);
      $Body->set('Title', $Title);
      $metaRobots = '<meta name="robots" content="noindex,nofollow" />';

}

 
// TEMPLATE VARS //////////////////////////////////////////////// 


$Page->set('PageTitle', $Title.BAR.SITE_TITLE);
$Page->set('BannerTitle', BANNER_TITLE);
$Page->set('FaqTitle', FAQ_TITLE);
$Page->set('Sort', $S);

$Body->set('Tests', $Tests);
$Body->set('SelectedTest', $T);
$Body->set('Langs', $Langs);
$Body->set('SelectedLang', $L);
$Body->set('SelectedLang2', $L2);
$Body->set('Sort', $S);
$Body->set('Excl', $Excl);

$About->set('SelectedTest', $T);
$About->set('SelectedLang', $L);
$About->set('Sort', $S);
$Body->set('About', $About->fetch($AboutTemplateName));

$Page->set('PageBody', $Body->fetch($TemplateName));
$Page->set('Robots', $metaRobots);
echo $Page->fetch('page.tpl.php');
?>

