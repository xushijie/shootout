<p>Each program should</p>
<ul>
  <li>read all of a redirected <a href="http://en.wikipedia.org/wiki/Fasta_format">FASTA format</a> file from stdin</li>
  <li>define a collection of simple regex patterns,
   representing DNA 8-mers and their reverse complement (with a wildcard in one position), 
   and count matches in the redirected file
  </li>
  <li>write the regex pattern and count</li>
</ul>


<p>We use FASTA files generated by the <a href="benchmark.php?test=fasta&amp;lang=all&amp;sort=<?=$Sort;?>">fasta benchmark</a> as input for this benchmark. Note: the file may include both lowercase and uppercase codes.</p>

<p>Correct output for this 100KB <a href="iofile.php?test=<?=$SelectedTest;?>&amp;lang=<?=$SelectedLang;?>&amp;sort=<?=$Sort;?>&amp;file=input">input file</a> (generated with the fasta program N = 10000), is</p>
<pre>
agggtaaa|tttaccct 0
[cgt]gggtaaa|tttaccc[acg] 3
a[act]ggtaaa|tttacc[agt]t 8
ag[act]gtaaa|tttac[agt]ct 8
agg[act]taaa|ttta[agt]cct 7
aggg[acg]aaa|ttt[cgt]ccct 3
agggt[cgt]aa|tt[acg]accct 4
agggta[cgt]a|t[acg]taccct 3
agggtaa[cgt]|[acg]ttaccct 5
</pre>
<br />

<p></p>

