<!--#set var="TITLE" value="Sieve of Eratosthenes Benchmark" -->
<!--#set var="KEYWORDS" value="performance, benchmark, 
sieve, eratosthenes, erastosthenes, primes, c, eiffel, erlang, gawk,
awk, guile, java, perl, python, tcl, computer, language, compare, cpu,
memory" -->

<?php require("../../html/testtop.php");
      testtop_nav("Sieve of Eratosthenes Benchmark"); ?>
      
<div class="h4"><h4>Measurements while N varies</h4></div>
<p>N is the number of times we compute the number of primes from 2
  through 8192.</p>

<?php #$file = "../../html/cmp_test.pl?$_SERVER['QUERY_STRING']";
      #require($file);
      require("../../html/detail.php"); ?>
