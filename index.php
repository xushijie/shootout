<?php require("html/header.phtml"); ?>
<?php require("nav.html"); ?>

<hr size="5" noshade>

<table border="0" cellspacing="0" cellpadding="4" id="main" width="100%">
  <tr valign="top">
    <td id="leftcol" width="20%">
      <div id="navcolumn">
        <div id="projecttools" class="toolgroups">
	  <div class="label">
	    <strong>The Benchmark Tests</strong>
	  </div>
	  <div class="body">
	  <div><a href="bench/ackermann/">Ackermann's Function</a></div>
	  <div><a href="bench/ary/">Array Access</a></div>
	  <div><a href="bench/wc/">Count Lines/Words/Chars</a></div>
	  <div><a href="bench/echo/">Echo Client/Server</a></div>
	  <div><a href="bench/except/">Exception Mechanisms</a></div>
	  <div><a href="bench/fibo/">Fibonacci Numbers</a></div>
	  <div><a href="bench/hash/">Hash (Associative Array) Access</a></div>
	  <div><a href="bench/hash2/">Hashes, Part II</a></div>
	  <div><a href="bench/heapsort/">Heapsort</a></div>
	  <div><a href="bench/hello/">Hello World</a></div>
	  <div><a href="bench/lists/">List Operations</a></div>
	  <div><a href="bench/matrix/">Matrix Multiplication</a></div>
	  <div><a href="bench/methcall/">Method Calls</a></div>
	  <div><a href="bench/nestedloop/">Nested Loops</a></div>
	  <div><a href="bench/objinst/">Object Instantiation</a></div>
	  <div><a href="bench/prodcons/">Producer/Consumer Threads</a></div>
	  <div><a href="bench/random/">Random Number Generator</a></div>
	  <div><a href="bench/regexmatch/">Regular Expression Matching</a></div>
	  <div><a href="bench/reversefile/">Reverse a File</a></div>
	  <div><a href="bench/sieve/">Sieve of Eratosthenes</a></div>
	  <div><a href="bench/spellcheck/">Spell Checker</a></div>
	  <div><a href="bench/moments/">Statistical Moments</a></div>
	  <div><a href="bench/strcat/">String Concatenation</a></div>
	  <div><a href="bench/sumcol/">Sum a Column of Integers</a></div>
	  <div><a href="bench/wordfreq/">Word Frequency Count</a></div>
	</div>
      </div>
      <div id="helptext" class="toolgroup">
        <div class="label">
	  <strong>Note:</strong>
	</div>
	<div class="body">
	  <div><a href="#">Not all languages are tested in every benchmark</a></div>
	  <div><a href="http://shootout.alioth.debian.org/bench/report.txt">What solutions have not been implemented yet?</a></div>
	  <div><a href="http://alioth.debian.org/tarballs.php/?group_id=10039">Where can I get a copy of the shootout?</a></div>
	</div>
      </div>
      <div id="admfun" class="toolgroup">
        <div class="label">
	  <strong>Other Language Comparisons</strong>
	</div>
	<div class="body">
	  <div><a href="compare/binext/">Creating Binary Extensions</a></div>
	</div>
      </div>
    </td>
    <td>
      <div id="bodycol">
        <div id="apphead">
	  <h2>A benchmark comparison of a number of programming languages.</h2>
	</div>
	<div class="h3" id="intro">
	  <h3>Intro</h3>
	  <p>This is an updated version of Doug Bagley's original <a href=
"http://www.bagley.org/~doug/shootout">Great Computer Language Shootout</a>, updated with new languages and revised to work with modern compilers.</p>
	  <p>When I started this project, my goal was to compare all the major
scripting languages.  Then I started adding in some compiled languages for comparison ... and it's still growing with no end in sight (so be sure to read the <a href="news.phtml">NEWS</a>).  I'm doing it so that I can learn about new languages, compare them in various (possibly meaningless) ways, and most importantly, have some fun.</p>
          <p>Someday, maybe, the results I present might even be meaningful, but
please take the current results with a grain of salt.  You might get different results on a different OS, on different hardware, with newer releases of the languages, or even from run to run of the same test.  You might even find that I have horrible bugs in my testing <a href="method.shtml">method</a>.</p>
          <p><u>This is very much a work in progress</u>, as it evolves I may add, change or remove languages, tests, or solutions.  Some solutions as currently presented are unoptimized, and may be optimized in the future (if I can do it myself or if someone contributes a better solution).</p>
          <ul><font size="-1">
	    <p><b>Disclaimer No. 1:</b> I'm just a beginner in many of these languages, so if you can help me improve any of the solutions, please drop me an <a
href="mailto:(Doug Bagley) doug+(hairyrfc822)nospam.shootout@bagley(not .com).org">email</a>.  Thanks.</p>
            <p><b>Disclaimer No. 2:</b> These pages are provided for novelty
purposes only.  Any other use voids the manufacturer's warranty.  Do not mix with alchohol.  Some contents may consist of recycled materials.</p>
            <p><b>Disclaimer No. 3:</b> <a href="http://www.lib.uchicago.edu/keith/crisis/disclaimer.html">ditto</a>.</p>
            <p><b>Disclaimer No. 4:</b> Please read the pages on <a href="method.shtml">Methodology</a>, the <a href="faq.shtml">FAQ</a>, and <a href="conclusion.shtml">my Conclusion</a> before you flame.</p>
	  </font></ul>
          <p>By the way, the word <i>Great</i> in the title refers to quantity,
not quality (I will let the reader judge that).  I saw a need for a more comprehensive language comparison than what I could find out on the Net, and you are reading my solution.  I wanted to see a comparison of more languages doing more tests, and with (hopefully) the participation of more people.</p>
          <p>Aldo Calpini has put a huge amount of work into <a href="http://dada.perl.it/shootout">porting my shootout to Microsoft Windows</a>.  He even
includes some new languages and some commercial compilers that run on Windows. Please click <a href="http://dada.perl.it/shootout">here</a> to check it out.
(Please note that there may be some differences in his port. It is really a separate, derivative work). Many thanks to Aldo!</p>
        </div>
	<div class="h3" id="download">
        <h3>Download</h3>
	<p>You can now download the entire shootout as a compressed tarball from the <a href="download">download page</a>.  The current distribution is about  1.5MB and it is approximately alpha quality (it is probably suitable only for the adventurous).  The tarball is now updated nightly.  I will try to keep the <a href="news.phtml">News</a> up-to-date to explain the new stuff.</p>
	</div>
	<div class="h3" id="links">
	<h3>Links</h3>
	<p>I found the following links of interest while working on this project:</p>
	<ul>
	  <!-- busted link
	  <li><a href="http://wwwipd.ira.uka.de/~prechelt/Biblio/jccpprt_computer2000.ps.gz">An empirical comparison of C, C++, Java, Perl, Python, Rexx, and Tcl for a search/string-processing program</a> by Lutz Prechelt (gzipped Postscript).</li> -->
	  <li><a href="http://huzhe.topcities.com/LanguageStudy.htm">A Comparison of Programming Languages for Scientific Processing</a> by D. McClain</li>
	  <li><a href="http://phaseit.net/claird/comp.lang.misc/language_comparisons.html"> Cameron Laird's personal notes on language comparisons</a></li>
	  <li><a href="http://directory.google.com/Top/Computers/Programming/Languages/">Computers > Programming > Language</a> at Google Web directory.</li>
	  <li><a href="http://www.tunes.org/Review/Languages.html">Review of existing Languages</a> at Tunes.org</li>
	  <li><a href="http://www.people.Virginia.EDU/~sdm7g/LangCrit/">Programming Language Critiques</a> by Steven D. Majewski</li>
	  <li><a href="http://www.angelfire.com/tx4/cus/shapes/index.html">OO Shape Examples</a> by Chris Rathman</li>
	  <li><a href="http://pleac.sourceforge.net/">PLEAC - Programming Language Examples Alike Cookbook</a></li>
	  <li><a href="http://www.uni-karlsruhe.de/~uu9r/lang/html/lang.en.html">Michael Neumann's page comparing some small programs over 100+ languages.</a></li>
	</ul>
      </div>
    </div>
  </td>
</tr>
</table>

<br>

<table border="0" cellspacing="0" cellpadding="4" id="main" width="100%">
  <tr valign="top">
    <td>
      <?php require("versions.html"); ?>
    </td>
    <td valign="top" bgcolor="white">
    <div class="h3" id="langs">
      <h3>About the Languages</h3>
      <p>The languages compared here are a mixture of compiled and interpreted,
functional and imperative.  Compiled languages have the natural advantage of running machine code that can be optimized by the compiler.  The interpreted languages are often byte-compiled, and sometimes optimized.  Many of the tests were
designed to really test imperative features, and do not fairly test some languages (like Haskell).  If you want to compare languages of the same <i>type</i>, consider:
<ul>
<li>
The languages that are in <b><i>bold italics</i></b> compile to machine
code.  The others are either byte-compiled or just interpreted.
<p>
When using C and C++, I think it is normal and expected to use
external libraries.  In this vein, we'll often use 

<a href="http://www.sgi.com/tech/stl/">STL</a>
<a href="http://www.sgi.com/tech/stl/download.html">v3.3</a>

with C++.
<p>
However, with most other languages we will try to use only features
in the language's core or its standard libraries.
<p>
There is also a very handy library for doing Perl Compatible Regular
Expressions: PCRE (see the <a href="bench/regexmatch">Regular
Expression Matching</a> test), which I will use with some languages.
<br><br><li>
Bigloo Scheme, CMU Common Lisp, SmallEiffel, GHC (Haskell), Mercury,
Ocaml, and SML/NJ compile to native code.  Some are actually
compiled to intermediate C first.
<br><br><li>
Sun's Java uses a JIT compiler so the code is compiled to native code
on the fly.
<br><br><li>
Guile, Lua, Perl, Python, Rep, Ruby and Tcl are all interpreted
<i>scripting</i> / <i>extension</i> languages, and they can probably
all be considered competitors in the same space.  Perl, Python, Ruby
and Tcl all come with extensive libraries in their standard
distributions.  Guile and Rep have less extensive libraries, and Lua
is absolutely tiny, with no extra libraries.
<br><br><li>
Pike and Icon are not strictly extension languages but are similar
in many ways to the previous group.
<br><br><li>
Erlang also compiles to bytecodes, but it isn't really thought of as
a scripting language.
<br><br><li>
AWK is really just a scripting language, it's not typically embedded
or extended with C or other compiled languages.
<br><br><li>
Gforth is an interpreted forth, and it can produce extremely fast
code.  But Forth is a pretty low-level language, and optimization
usually left up to the programmer.
<br><br><li>
I include Bash just for fun, and often resort to the standard bash
programming technique of calling the usual Unix shell commands.
</ul>

</td></tr>
</table>


<?php require("html/footer.phtml") ?>

<!-- nobody really reads the mail sent to these addresses ... can ya dig it? -->
<a href="mailto:charlescosgroveclean007@net-sieve.com">&nbsp;</a>
<a href="mailto:jack.bo.sh@infospeed.net">&nbsp;</a>
