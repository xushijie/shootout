<?   // Copyright (c) Isaac Gouy 2004, 2005 ?>

<div>This FAQ is short. You can read it really quickly.</div>

<!-- WHAT CAN I LEARN HERE? /////////////////////////////////////////////// -->
<table class="div">
<tr><td><h3 class="rev">&nbsp;What can I learn here?</h3></td></tr>
<tr><td>
<p><em>The Computer Language Shootout</em> has a <strong>very narrow focus</strong>.</p>

<p>We are only trying to show the performance of various programming language implementations, on a limited number of <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=benchmarking&amp;title=Flawed Benchmarks" title="Learn a little about benchmarking"><strong>flawed benchmarks</strong></a>.</p>

<p>We <strong>are not</strong> trying to</p>
<ul>
<li>provide a library of best-in-class algorithms</li>
<li>showcase the capabilities of different languages</li>
<li>compare programming language productivity </li>
<li>provide an <em>ultimate</em> benchmark for some domain</li>
<li><em>etc etc</em></li>
</ul>
<p>We are only trying to show performance on a limited number of <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=benchmarking&amp;title=Flawed Benchmarks" title="Learn a little about benchmarking"><strong>flawed benchmarks</strong></a> across a wide range of programming language implementations.
</p>
</td></tr>

<tr class="b"><td>What should I do?</td></tr>
<tr><td>
<p>Read about benchmarking: Do you understand the <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=benchmarking&amp;title=Flawed Benchmarks" title="Learn a little about benchmarking"><strong>flaws</strong></a>?</p>
<p>Read the source-code: Are the programs really comparable?</p>
<p>Read the source-code: Can you write faster or more elegant code?</p>
</td></tr>
</table>


<table class="div">
<tr><td><h3 class="rev">&nbsp;How can I help?</h3></td></tr>

<tr class="b"><td>Where can I send <strong>comments</strong> and suggestions?</td></tr>
<tr><td><p>Let us know about mistakes and inconsistencies. Share your comments by subscribing to the 
<a href="miscfile.php?sort=<?=$Sort;?>&amp;file=mailinglist&amp;title=mailing list" title="Mailing list archives, posting and subscription"><strong>mailing list</strong></a>.</p>
<p>Use Tracker to report <a href="https://alioth.debian.org/tracker/?atid=411002&amp;group_id=30402&amp;func=browse"><strong>Bugs</strong></a> or document <a href="https://alioth.debian.org/tracker/index.php?group_id=30402&amp;atid=411005"><strong>Feature Requests</strong></a>.</p>
</td></tr>

<tr class="b"><td><a name="contribute">How can I contribute a program?</a></td></tr>
<tr><td>
<p>Before contributing programs</p>
<ul>
<li>read the <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=license&amp;title=revised BSD license" title="Read the revised BSD license"><strong>Revised&nbsp;BSD&nbsp;license</strong></a> - all contributed programs are published under this revised BSD license.</li>
<li>read <a href="faq.php?sort=<?=$Sort;?>#implement"><strong>How should I implement&#8230;?</strong></a></li>
</ul>


<p>And then follow these instructions!</p>
<p><strong>Start from the bottom</strong> of the
   <a href="https://alioth.debian.org/tracker/?func=add&amp;group_id=30402&amp;atid=411646"  title="Contribute Programs - Submit New">
   <strong>Contribute Programs Submit-New</strong></a> form and work your way up as follows:
</p>
<ol>
<li>Check to Upload &amp; Attach File: program source-code</li>
<li>Browse to the program source-code file</li>
<li>Description: what's different about this program</li>
<li>Summary: language, benchmark, your-name, date, (version)<br/>
<em>Ruby nsieve Glenn Parker 2005-03-28</em><br/>
This convention ensures that each item will have a unique Summary text. (Alioth Tracker insists that each Summary text be unique!)
</li>
<li>Category: select the language implementation</li>
<li>Group: select the benchmark</li>
<li>click the Submit button</li>
</ol>


<p>Track status with Browse <a href="https://alioth.debian.org/tracker/?func=browse&amp;group_id=30402&amp;atid=411646" title="Browse Contribute Programs"><strong>Contribute Programs</strong></a></p>
<ul>
<li><em>Open items</em> are new contributions</li>
<li><em>Pending items</em> have been added to CVS</li>
<li><em>Closed items</em> are being shown on the website</li>
<li><em>Deleted items</em> have been removed from the website</li>
</ul>

</td></tr>

<tr class="b"><td>How can I help with <strong>the chores</strong>?</td></tr>
<tr><td>
<p>We need volunteers to</p>
<ol>
<li>Browse <a href="https://alioth.debian.org/tracker/?func=browse&amp;group_id=30402&amp;atid=411646" title="Browse Contribute Programs"><strong>Contribute Programs</strong></a> for <em>Open items</em></li>
<li>check the <em>Open item</em> programs do what's required</li>
<li>add acceptable <em>Open item</em> programs to CVS</li>
<li>update the status of accepted <em>Open items</em> to <em>Pending</em></li>
</ol>
<p>And we need them to</p>
<ol>
<li>remove slower less-elegant programs from CVS</li>
<li>update the status of removed <em>Closed items</em> to <em>Deleted</em></li>
</ol>

<p>And other chores listed in the <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=committerfaq&amp;title=Committer&nbsp;FAQ" title="Committer FAQ"><strong>Committer FAQ</strong></a>.</p>
<p>Do you have the necessary programming language knowledge?<br/>
Do you want to help with the chores?<br/>
Contact us!</p>
</td></tr>

<tr class="b"><td>How can I contribute a new benchmark?</td></tr>
<tr><td>
<p>Do all the work!</p>
<ul>
<li>Understand that benchmarks must be reasonable across a wide range of programming languages</li>
<li>Identify what's missing or wrong with the current benchmarks</li>
<li>Define a new benchmark and give some background information</li>
<li>Provide implementations in an interpreted language, a JIT language, and a compiled language</li>
</ul>
<p>And then, <em>maybe</em>, we just-might consider it.</p>
<p>(See this <a href="http://lists.alioth.debian.org/pipermail/shootout-list/2005-March/001272.html" >mailing-list discussion</a>)</p>
</td></tr>

<tr><td>
<p>Browse <a href="https://alioth.debian.org/tracker/index.php?group_id=30402&amp;atid=411005"><strong>Feature Requests</strong></a> with Category <strong>New Benchmark</strong> to see if it's already been suggested.</p>
</td></tr>

</table>


<!-- HOW SHOULD I IMPLEMENT ...? /////////////////////////////////////// -->

<table class="div">

<tr><td><h3 class="rev"><a name="implement">&nbsp;How should I implement&#8230;?</a></h3></td></tr>

<tr class="b"><td>How should I implement programs for the Shootout?</td></tr>
<tr><td>
<p>We prefer <strong>plain vanilla programs</strong> - after all we're trying to compare language implementations not programmer effort and skill.</p> 
<p>We also have a weakness for idiosyncratic, elegant, clever programs; and when they are too elegant to meet the requirements of the benchmark we <em>might</em> still show them in the <a href="faq.php?sort=<?=$Sort;?>#alternative">'Interesting Alternative Programs'</a> section.</p> 
</td></tr>

<tr class="b"><td>How much effort should I put into getting the program correct?</td></tr>
<tr><td>
<p>Do design-iteration on your machine, or in a language newsgroup. Only Contribute Programs which give <strong>correct results</strong> on your machine. (Don't make-unnecessary-work for the volunteer committers.)</p>
<p>Check the <strong>output format</strong> matches the example output format - the program will fail if the format is different. (Complain if the benchmark page doesn't show example output.)</p> 
<p>Leave it a couple of days, and then see if there are any <strong>minor improvements</strong> that you'd like to make, before you Contribute Programs to the Computer Language Shootout.</p> 
</td></tr>


<tr class="b"><td>How should I implement data-input?</td></tr>
<tr><td>
<p>Programs are measured across a range of input-values; programs are expected to either take a <strong>single command-line parameter</strong> or read text from <strong>stdin</strong>.</p> 
<p>(Look at what the other programs do.)</p>
</td></tr>

<tr class="b"><td>How should I implement loops?</td></tr>
<tr><td><p>Don't manually unroll loops!</p> 
</td></tr>

<tr class="b"><td>How should I advertise my company, services, website&#8230;?</td></tr>
<tr><td><p><strong>We'll remove any promos</strong> that you add as comment text, so please don't waste our time.</p> 
</td></tr>

<tr class="b"><td>How should I grab bragging rights?</td></tr>
<tr><td><p>Include a header comment in the program like this:</p>
<pre>
/* The Great Computer Language Shootout
   http://shootout.alioth.debian.org/

   contributed by &#8230;
   modified by &#8230;

*/
</pre>
</td></tr>


<tr class="b"><td><a name="sameway">How should I implement a same way program?</a></td></tr>
<tr><td><p>Use the same algorithm and data structures. As-far-as possible the languages should be doing the same operations.</p>
<p>The <strong>same way</strong> programs aim to answer questions like "Is array subscripting faster in Perl or Python?" and 
"Are hash table update operations faster in Tcl or Ruby?". For example the <a href="benchmark.php?test=sieve&amp;lang=all&amp;sort=<?=$Sort;?>" title="Compare performance on the primes benchmark">primes</a> programs.</p>
<p>The same way programs often seem naive and unidiomatic.</p> 
</td></tr>




<tr class="b"><td><a name="samething">How should I implement a same thing program?</a></td></tr>

<tr><td><p>Use whatever algorithm and data structure you like, within the stated constraints. We may specify that the problem has to be solved in constant space, or that reads can be no larger than 4K, or &#8230;</p>
<p>The <strong>same thing</strong> programs aim to answer questions like "Is it faster to write a word frequency counter in Perl or Bash?". For example the <a href="benchmark.php?test=wordfreq&amp;lang=all&amp;sort=<?=$Sort;?>" title="Compare performance on the word-frequency benchmark">word-frequency</a> programs.</p>
<p>The same thing programs are free to use the most appropriate, idiomatic code for a solution.</p>       
</td></tr>



<tr class="b"><td><a name="samething">How should I implement&#8230;?</a></td></tr>
<tr><td>
<ol>
<li>Keep to the spirit-of-the-specification not just the wording.</li><li>Write the program to be as-fast-as possible.</li><li>Write the program to conserve memory as-much-as possible.</li>
<li>Write the program as-if lines of code were not being measured.</li>
</ol>     
</td></tr>

</table>




<!-- WHERE CAN I? ////////////////////////////////////////////////// -->
<table class="div">
<tr><td><h3 class="rev">&nbsp;Where can I&#8230;?</h3></td></tr>

<tr class="b"><td>Where can I see more about a <strong>Timeout</strong> or <strong>Error</strong>?</td></tr>
<tr><td>
<p>Sometimes a program may produce the correct results, within the timeout, for smaller workloads - so check the complete data-table on the <strong>side-by-side comparison</strong> page.</p>
<p>You may find information about an Error in the 'build &amp; benchmark results' section of the program page.</p>
</td></tr>


<tr class="b"><td>Where can I see which language version was used?</td></tr>
<tr><td>
<p>You can see information about the language implementation, including the version number, at the bottom of each <strong>rankings page</strong>.</p>
</td></tr>

<tr class="b"><td>Where can I see which compiler and runtime options were used?</td></tr>
<tr><td>
<p>You can see the build commands and runtime commands in the <strong>build &amp; benchmark results</strong> section, on each program page.</p>
</td></tr>

<tr class="b"><td>Where can I download the <strong>data</strong> from?</td></tr>
<tr><td><p>You can <strong>download</strong> a <a href="<?=$Download.'ndata.csv';?>" title="Download CSV spreadsheet">CSV spreadsheet</a> ~350KB.</p></td></tr>

<tr class="b"><td>Where can I see what other people think about the Language Shootout?</td></tr>
<tr><td><p>You can start by reading the <a href="http://lists.alioth.debian.org/pipermail/shootout-list/" title="shootout-list archives">mailing-list archives.</a></p></td></tr>

<tr class="b"><td>Where can I download the program sources and build scripts?</td></tr>
<tr><td><p>You can <a href="http://alioth.debian.org/scm/?group_id=30402"  title="Browse the Great Computer Language Shootout CVS tree">browse the CVS tree</a>.</p>
</td></tr>

<tr class="b"><td>Where can I find out more?</td></tr>

<tr><td><p>You could learn something more about <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=benchmarking&amp;title=benchmarking" title="Benchmarking suites and language comparison links"><strong>benchmarking</strong></a>.
</p></td></tr>

<tr><td><p>The <strong>project is hosted</strong> by <a href="http://alioth.debian.org/projects/shootout"  title="The Great Computer Language Shootout project page on Alioth at Debian.org">Alioth&nbsp;Debian.org</a>.
</p></td></tr>
</table>



<!-- WHAT DOES ... MEAN? /////////////////////////////////////////////// -->
<table class="div">
<tr><td><h3 class="rev">&nbsp;What does &#8230; mean?</h3></td></tr>

<tr class="b"><td><a name="alternative">What does Interesting Alternative Program mean?</a></td></tr>
<tr><td>
<p>"Interesting Alternative Program" means that the program doesn't implement the benchmark according to the arbitrary and idiosyncratic rules of the Computer Language Shootout - but <strong>we simply couldn't resist</strong> showing the program.</p>
</td></tr>

<tr class="b"><td><a name="fullcpu">What does Full CPU Time mean?</a></td></tr>
<tr><td>
<p>Full CPU Time means <strong>program run-time</strong> including program <strong>startup time</strong>. So for Java that includes the time to startup a JVM.</p>

<p>You can see how startup time varies between languages from the <a href="benchmark.php?test=hello&amp;lang=all&amp;sort=<?=$Sort;?>" title="Compare performance on the startup benchmark">startup benchmark</a> programs.</p>
</td></tr>

<tr class="b"><td><a name="cpu">What does CPU Time mean?</a></td></tr>
<tr><td><p>The CPU Time is the measured CPU time minus the average program startup time for the language.</p></td></tr>
</table>






<!-- HOW DID YOU MEASURE...? /////////////////////////////////////////////// -->



<table class="div">

<tr><td><h3 class="rev">&nbsp;How did you measure&#8230;?</h3></td></tr>





<tr class="b"><td>How did you measure <strong>CPU time?</strong></td></tr>



<tr><td><p>Each program was run as a child-process of a Perl script. The script waits for the child-process to exit and takes usr+sys times with (<a href="http://packages.debian.org/stable/interpreters/libbsd-resource-perl" title="Debian package 'perl BSD::Resource - BSD process resource limit and priority'">BSD::Resource::times</a>)[2,3].</p>

<p>The Full CPU time includes program <strong>startup time</strong>. You can see how startup time varies between languages from the <a href="benchmark.php?test=hello&amp;lang=all&amp;sort=<?=$Sort;?>" title="Compare performance on the startup benchmark">startup benchmark</a> programs.</p><p>

Each program was run once pre-test to reduce cache effects. Each program was then run 3 times. We show the lowest measured CPU time and the highest memory usage, from the 3 runs.</p>



</td></tr>







<tr class="b"><td><a name="memory">How did you measure <strong>memory usage?</strong></a></td></tr>

<tr><td><p>In a very approximate and unreliable way. We sampled the child-process resident memory size (VmRSS) multiple times a second. We identified the main thread by checking for SIGCHLD being registered as the exit_signal in the second to last field of /proc/{pid}/stat.</p>
<p>There's a race condition. When the program completes quickly, this sampling technique will fail.</p>       
</td></tr>


<tr class="b"><td><a name="codelines">How did you measure <strong>lines-of-code?</strong></a></td></tr>

<tr><td>
<p>In a haphazard and approximate way - blank lines and comments were removed, and then we counted the lines that remain.</p>
<p>We reserve the right to format the code entries as we see fit, whatever the lines-of-code count may be.</p> 
</td></tr>


<tr class="b"><td>What machine are you running the programs on?</td></tr>
<tr><td>
<p>The current <strong>test machine</strong> is a single-processor 1.1 Ghz AMD Athlon machine with 256 MB of RAM and a 20GB IDE disk drive.</p></td></tr>

<tr class="b"><td>What OS are you using on the test machine?</td></tr>

<tr><td><p>Debian 'unstable', Kernel 2.6.8-1-k7</p></td></tr>


</table>




<!-- WHY DON"T YOU INCLUDE...? /////////////////////////////////////////////// -->



<table class="div">
<tr><td><h3 class="rev">&nbsp;Why don't you include&#8230;?</h3></td></tr>

<tr class="b"><td>What kind of programming languages will you accept?</td></tr>

<tr><td>
<p>Programming languages that can be used to write most of our benchmark programs!</p> 
<p><strong>Must have</strong></p>
<ol>
<li>A <a href="http://www.debian.org" title="The Debian.org website">Debian package</a> (either from Debian itself, or the primary authors of the language.)
<br />Or build and install with <code>./configure &amp;&amp; make &amp;&amp; make install</code> and a default target of <code>/usr/local.</code></li>
<li>Documentation.</li>
<li>Command-line argument handling.</li>
<li>32-bit Integers.</li>
<li>Double precision floating point numbers.</li>
<li>Dynamic hash tables and sequences (arrays or lists).</li>
<li>Line-oriented read &amp; write from stdin &amp; stdout.</li>
</ol>

<p><strong>Should have</strong></p>
<ol>
<li>Buffered stdio.</li>
<li>Exception handling.</li>
<li>Regular Expressions (preferably Perl compatible).</li>
<li>Concurrency (threads, coroutines, &#8230;)</li>
<li>TCP/IP Sockets.</li>
<li>Object-oriented programming features.</li>
</ol>
</td></tr>


<tr class="b"><td>Why don't you include language X?</td></tr>
<tr><td><p>Is the language &#8230;</p>

<ol>
<li><strong>Free?</strong> The hope is that people who come across the shootout
will be motivated to learn a new language, and since the barriers
to learning a new language are far lower for a free implementation,
those are the prefered languages for display.  While commercial
languages are not officially disqualified, there do not
seem to be many compelling reasons to include them.</li>
<li><strong>Open source?</strong>  Programming languages should
be open source.  As language users, when we find a problem but do
not have access to the source code it is very frustrating.  If
you have ever had to maintain production software for a compiler
that is no longer available from a vendor, with no available bug
fixes, you will soon understand this requirement.</li>
<li><strong>Used?</strong> There are way too many dead languages and unused project languages.</li>
<li><strong>Interesting?</strong> Is there something significant and interesting about the language that will be obvious from these benchmark programs?</li>
</ol>
<p>We will accept <strong>and reject</strong> languages in a capricious, unfair, biased fashion :-)</p>
</td></tr>

<tr class="b"><td>Please will you include my favourite language?</td></tr>

<tr><td>
<p>Maybe we will when you write 15 of the benchmark programs in your favourite language, and contribute them to "The Great Computer Language Shootout" :-)</p>
</td></tr>

<tr><td>
<p>Browse <a href="https://alioth.debian.org/tracker/index.php?group_id=30402&amp;atid=411005"><strong>Feature Requests</strong></a> with Category <strong>New Language</strong> to see if it's already been suggested.</p>
</td></tr>

</table>


<!-- WHEN? /////////////////////////////////////////////////////////////////// -->

<table class="div">

<tr><td><h3 class="rev">&nbsp;When&#8230;?</h3></td></tr>

<tr class="b"><td>When will you include my contribution?</td></tr>

<tr><td>
<p>When we can! We already spend way-too-much personal-time on this website. Things get-done when they get-done.</p>
<p>Maybe you'd like to help us?</p>
</td></tr>

<tr class="b"><td>When will the Language Shootout be finished?</td></tr>

<tr><td>
<p>Never. There will always be new languages, new versions of languages, more sensible benchmarks, faster more-elegant programs, new operating systems, better graphics&#8230; And the project team will change over time, and the measurements and presentation will change with them.</p>
</td></tr>

</table>



<!-- WHO? /////////////////////////////////////////////////////////////////// -->

<table class="div">

<tr><td><h3 class="rev">&nbsp;Who&#8230;?</h3></td></tr>

<tr class="b"><td>Who started "The Great Computer Language Shootout"?</td></tr>
<tr><td><p>Doug Bagley created "The Great Computer Language Shootout", and it was active until 2001.</p><p>Aldo Calpini ported that to create <a href="http://dada.perl.it/shootout/" title="The Computer Language Shootout for MS Windows programming languages">"The Great Win32 Computer Language Shootout"</a> - it was last updated June 2003.</p>

<p>In mid-2004 Brent Fulgham revived "The Great Computer Language Shootout" here on Alioth&nbsp;Debian.org</p>
<p>In the following months, things started to change. First, the website was redesigned. Then benchmarks were deprecated. Then new benchmarks were added. Who knows where it will end?</p>
</td></tr>

<tr class="b"><td>Who has contributed?</td></tr>

<tr><td><p>So many people that we have an <a href="miscfile.php?sort=<?=$Sort;?>&amp;file=acknowledgements&amp;title=acknowledgements" title="Acknowledgements to those who have contributed to The Great Computer Language Shootout">acknowledgements page</a>!</p></td></tr>
</table>


<!-- WHY? /////////////////////////////////////////////////////////////////// -->

<table class="div">

<tr><td><h3 class="rev">&nbsp;Why&#8230;?</h3></td></tr>

<tr class="b"><td>Why are you doing this?</td></tr>
<tr><td><p>To learn and to <strong>have fun</strong>.</p><p>We will continue as long as the fun holds out.</p></td></tr>

</table>





