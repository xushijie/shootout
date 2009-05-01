<?   // Copyright (c) Isaac Gouy 2004-2009 ?>

<p class="timestamp"><? printf('%s GMT', gmdate("d M Y, l, g:i a", $Changed)) ?></p>
<p>This FAQ is short. You can read it really quickly.</p>


<dl>
<dt><a href="#game" name="game">&nbsp;What kind of game is this?</a></dt>
<dd>
<dl>
<dd>
<p>A game begun years ago. A game with many winners. A game with many players.</p>
</dd>

<dt><a href="#scored" name="scored"><strong>How is the game scored?</strong></a></dt>
<dd>
<p>On 3 measures - <a href="#measurecpu">&darr;&nbsp;time</a>, <a href="#memory">&darr;&nbsp;memory use</a> and <a href="#gzbytes">&darr;&nbsp;source code size</a>.</p>
</dd>

<dt><a href="#play" name="play"><strong>How do I play?</strong></a></dt>
<dd>
<p>Look at what we show for Ubuntu&#8482; Intel&#174; Q6600&#174; quad-core. Choose one of those programming languages. Choose one of those benchmarks. Read and accept <a href="miscfile.php?file=rules&amp;title=The Benchmarks Game Rules">the benchmarks game rules</a>. Ask questions <a href="#help">&darr;&nbsp;in the discussion forum</a>.</p>
<p><a href="#implement">&darr;&nbsp;Write a new program</a> and make sure it's correct by diff'ing the output. Profile and improve the program. <a href="#contribute">&darr;&nbsp;Attach the program source code file to a tracker item</a>.</p>
</dd>

<dt><a href="#oneone" name="oneone"><strong>How do I compare 2 language implementations?</strong></a></dt>
<dd>
<p>Compare them directly <a href="benchmark.php?test=all&amp;lang=gpp&amp;lang2=java"><strong>one-against-another</strong> for all the benchmarks</a>.</p>
</dd>


<dt><a href="#several" name="several"><strong>How do I compare 3 or 4 or more language implementations?</strong></a></dt>
<dd>
<p>Compare the <a href="benchmark.php?test=all&amp;lang=all&amp;d=data&amp;calc=calculate&amp;gpp=on&amp;gcc=on&amp;java=on&amp;javaxint=on&amp;jruby=on&amp;box=1"><strong>boxplot summary</strong> of measurements for just those language implementations</a>.</p>
</dd>

<dt><a href="#sideside" name="sideside"><strong>How do I compare 2 or 3 or 4 programs?</strong></a></dt>
<dd>
<p>Compare them directly <a href="fulldata.php?test=fannkuch&amp;p1=java-1&amp;p2=gcc-1&amp;p3=php-1&amp;p4=perl-1"><strong>side-by-side</strong> for all the measurements</a>.</p>
</dd>

<dt><a href="#datasets" name="datasets"><strong>Why is the program better on ...?</strong></a></dt>
<dd>
<p>That might be an interesting question <em>if</em> it's asked about the different measurements made on <strong>the same</strong> Intel<sup>&#174;</sup> Q6600<sup>&#174;</sup> machine.</p>
<p>However, if the question is asked about about different test machines then as well as the obvious differences - hardware, os, language implementation versions - it's likely that the programs measured on the different machines are different programs (either because missing third party libraries stop a program being measured, or simply because the program was not downloaded and measured).</p>
<p><em>Caveat lector!</em> Check the source code!</p>
</dd>

<dt><a href="#win" name="win"><strong>How do I win?</strong></a></dt>
<dd>
<p>Write the best program in your chosen language. Write programs that improve the showing of your chosen language. Learn something new.</p>
</dd>

<dt><a href="#winning" name="winning"><strong>Who's winning?</strong></a></dt>
<dd>
<p>It varies from benchmark to benchmark. It varies from week to week. It depends which language implementations are compared. It depends which measures are compared.</p>
<p><strong>Be curious</strong> - look at several benchmarks, compare several language implementations, compare them on different measures, read <a href="miscfile.php?file=benchmarking&amp;title=Flawed Benchmarks" title="Flawed Benchmarks - Are there any other kind?"><strong>Flawed Benchmarks</strong></a>.</p>
</dd>

<dt><a href="#end" name="end"><strong>When does the game end?</strong></a></dt>
<dd>
<p>When the facts exceed our curiousity.</p>
</dd>
</dl>
</dd>



<dt><a href="#means" name="means">&nbsp;Where are the results?</a></dt>
<dd>
<p></p>
<dl>


<dd>
<table class="layout">
<tr class="test">
<td>
<p class="timestamp"><a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements." href="../u32q/"><? printf('%s', gmdate("d M Y", filemtime('../u32q/data/data.csv'))) ?></a></p>
<h3><span class="u32q">
<a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements."
href="../u32q/">&nbsp;Ubuntu&#8482;&nbsp;:&nbsp;Intel&#174;&nbsp;Q6600&#174;&nbsp;quad-core&nbsp;</a></span></h3>
</td>
</tr>
</table>
</dd>


<dd>
<table class="layout">
<tr class="test">
<td>
<p class="timestamp"><a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements." href="../u64q/"><? printf('%s', gmdate("d M Y", filemtime('../u64q/data/data.csv'))) ?></a></p>
<h3><span class="u64q">
<a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements."
href="../u64q/">&nbsp;x64&nbsp;Ubuntu&#8482;&nbsp;:&nbsp;Intel&#174;&nbsp;Q6600&#174;&nbsp;quad-core&nbsp;</a></span></h3>
</td>
</tr>
</table>
</dd>

<dd>
<table class="layout">
<tr class="test">
<td>
<p class="timestamp"><a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements." href="../u64/"><? printf('%s', gmdate("d M Y", filemtime('../u64/data/data.csv'))) ?></a></p>
<h3><span class="u64">
<a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements."
href="../u64/">&nbsp;x64&nbsp;Ubuntu&#8482;&nbsp;:&nbsp;Intel&#174;&nbsp;Q6600&#174;&nbsp;one&nbsp;core&nbsp;</a></span></h3>
</td>
</tr>
</table>
</dd>


<dd>
<table class="layout">
<tr class="test">
<td>
<p class="timestamp"><a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements." href="../u32/"><? printf('%s', gmdate("d M Y", filemtime('../u32/data/data.csv'))) ?></a></p>
<h3><span class="u32">
<a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements."
href="../u32/">&nbsp;Ubuntu&#8482;&nbsp;:&nbsp;Intel&#174;&nbsp;Q6600&#174;&nbsp;one&nbsp;core&nbsp;</a></span></h3>
</td>
</tr>
</table>
</dd>



<dd>
<table class="layout">
<tr class="test">
<td>
<p class="timestamp"><a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements." href="../gp4/">mid 2008</a></p>
<h3><span class="gp4">
<a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements."
href="../gp4/">&nbsp;Gentoo&nbsp;:&nbsp;Intel&#174;&nbsp;Pentium&#174;&nbsp;4&nbsp;</a></span></h3>
</td>
<td>
<p class="timestamp"><a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements." href="../debian/">late 2007</a></p>
<h3><span class="debian">
<a title="Benchmark details and CPU time, memory use, program source code size, elapsed time measurements."
href="../debian/">&nbsp;Debian&nbsp;:&nbsp;AMD&#8482;&nbsp;Sempron&#8482;&nbsp;</a></span></h3>
</td>
</tr>
</table>
</dd>

<dd>
<p><img src="<?=IMAGE_PATH;?>fresh.png"
   alt=""
   title=""
   width="400" height="225"
 /></p>
</dd>



</dl>
</dd>



<dt><a href="#means" name="means">&nbsp;What does &#8230; mean?</a></dt>
<dd>
<dl>

<dt><a href="#fable" name="fable">What does <strong>"not fair"</strong> mean? (A fable)</a></dt>
<dd>
<p>They raced up, and down, and around and around and around, and forwards and backwards and sideways and upside-down.</p>
<p>Cheetah's friends said <strong>"it's not fair"</strong> - everyone knows Cheetah is the fastest creature but the races are too long and Cheetah gets tired!</p>
<p>Falcon's friends said <strong>"it's not fair"</strong> - everyone knows Falcon is the fastest creature but Falcon doesn't walk very well, he soars across the sky!</p>
<p>Horse's friends said <strong>"it's not fair"</strong> - everyone knows Horse is the fastest creature but this is only a yearling, you must stop the races until a stallion takes part!</p>
<p>Man's friends said <strong>"it's not fair"</strong> - everyone knows that in the "real world" Man would use a motorbike, you must wait until Man has fueled and warmed up the engine!</p>
<p>Snail's friends said <strong>"it's not fair"</strong> - everyone knows that a creature should leave a slime trail, all those other creatures are cheating!</p>
<p>Dalmatian's tail was banging on the ground. Dalmatian panted and between breaths said "Look at that beautiful mountain, let's race to the top!" </p>
</dd>


<dt><a href="#loadstring" name="loadstring">What does '27% 34% 28% 67%' ~ CPU Load mean?</a></dt>
<dd><p>When the program was being measured: the first core was not-idle about 27% of the time, the second core was not-idle about 34% of the time, the third core was not-idle about 28% of the time, the fourth core was not-idle about 67% of the time.</p>
<p>When <em>all the programs</em> show ~CPU Load like this '0% 0% 0% 100%' you are probably looking at measurements of programs forced to use just one core - the fourth core (rather than being allowed to use any or all of the CPU cores).</p>
</dd>

<dt><a href="#whatlanguage" name="whatlanguage">What language was used to write each initial benchmark program?</a></dt>
<dd><p>Different benchmark programs, different authors - different languages.</p>
<p>The benchmark descriptions sometimes refer to an article which included program source: Lisp and C for fannkuch; Java for binary-trees and meteor and chameneos; Haskell for pidigits; Erlang for thread-ring. And others as the author provided: C for mandelbrot and spectral-norm; Java for n-body. And others in Nice or C# or Lua or &#8230; as the mood would have it.</p>
</dd>

<dt><a href="#alternative" name="alternative">What does Interesting Alternative Program mean?</a></dt>
<dd><p>Interesting Alternative Program means that the program doesn't implement the benchmark according to the arbitrary and idiosyncratic rules of The Computer Language Benchmarks Game - but <strong>we simply couldn't resist</strong> showing the program.</p>
</dd>

<dt><a href="#id" name="id">What do #2 #3 mean?</a></dt>
<dd><p>Nothing - they are arbitrary suffixes that identify a specific program.</p>
</dd>


</dl>
</dd>



<dt><a href="#measure" name="measure">&nbsp;How did you measure&#8230;?</a></dt>
<dd>
<dl>
<dt><a href="#pretest" name="pretest">How did you measure?</a></dt>
<dd>
<ol>
<li>Each program was run and measured at the smallest input value, program output redirected to a file and compared to expected output. As long as the output matched expected output, the program was then run and measured at the next larger input value until measurements had been made at every input value.</li>

<li>If the program gave the expected output within an arbitrary cutoff time (now 120 seconds) the program was measured again repeatedly (now 6 times) with output redirected to /dev/null.</li>

<li>If the program didn't give the expected output within an arbitrary timeout (usually one hour) the program was forced to quit. If measurements at a smaller input value had been successful within an arbitrary cutoff time (now 120 seconds), the program was measured again repeatedly (now 6 times) at that smaller input value, with output redirected to /dev/null.</li>

<li>The measurements shown on the website are either
<ul><li>within the arbitrary cutoff - the lowest time and highest memory use from repeated measurements</li>
<li>outside the arbitrary cutoff - the sole time and memory use measurement</li></ul></li>

<li>For sure, programs taking 4 and 5 hours were only measured once!</li>
</ol>
</dd>

<dt><a href="#measurecpu" name="measurecpu">How did you measure <strong>time?</strong></a></dt>
<dd><p>The measurement techniques have changed a little:</p>
<ul>
<li>For the current measurements (Ubuntu Q6600) each program was run as a child-process of a Python script using Popen. The script child-process usr+sys rusage time was taken using os.wait3, and time was taken before forking the child-process and after the child-process exits, using time.time().</li>
<li>
For the old measurements (Gentoo Pentium 4 and Debian Sempron) each program was run as a child-process of a Perl script. The script child-process usr+sys time was taken before forking the child-process and after the child-process exits, using <a href="http://packages.debian.org/stable/perl/libbsd-resource-perl" title="Debian package 'perl BSD::Resource - BSD process resource limit and priority'">BSD::Resource::times</a>[2,3].
</li>
</ul>

<p><strong>Time measurements include program startup time.</strong></p>
</dd>

<dt><a href="#memory" name="memory">How did you measure <strong>memory use?</strong></a></dt>
<dd><p>By sampling GTop proc_mem for the program and it's child processes every 0.2 seconds. Obviously those measurements are unlikely to be reliable for programs that run for less than 0.2 seconds.</p>
</dd>

<dt><a href="#gzbytes" name="gzbytes">How did you measure <strong>GZip Bytes?</strong></a></dt>
<dd><p>We started with the source-code markup you can see, removed comments, removed duplicate whitespace characters, and then applied minimum GZip compression.</p>
</dd>

<dt><a href="#cpuload" name="cpuload">How did you measure <strong>~ CPU Load?</strong></a></dt>
<dd><p>The gtop cpu idle and gtop cpu total was taken before forking the child-process and after the child-process exits, The percentages represent the proportion of cpu not-idle to cpu total for each core.</p>
</dd>


<dt><a href="#copts" name="copts">How did you set <strong>compiler options?</strong></a></dt>
<dd><p>Without any optimization option the GCC compiler goal is to reduce compilation cost and make debugging reasonable. Typically we might set <tt>-O3 -fomit-frame-pointer -march=pentium4</tt>. For some benchmarks <tt>-mfpmath=sse -msse2</tt> makes a noticeable difference (note <a href="http://java.sun.com/j2se/1.4.2/1.4.2_whitepaper.html#7">J2SE use of SSE instruction sets</a>).</p>
</dd>

<dt><a href="#dynamic" name="dynamic">What about <strong>Java dynamic compilation</strong>?</a></dt>
<dd><p>In these examples we measured elapsed time once the Java program had started: in the first case, we simply started and measured the program 66 times; in the second case, we started the program once and repeated measurements again and again and again 66 times without restarting the JVM; and then discarded the first measurement leaving 65 data points. The usual startup measurements and the "*Java 6 steady state" approximations are shown alongside for comparison.</p>


<table>
<tr>
<th colspan="3">&nbsp;started&nbsp;65&nbsp;times&nbsp;</th>
<th colspan="2">&nbsp;repeated&nbsp;65&nbsp;times&nbsp;</th>
</tr>

<tr>
<th>&nbsp;</th>
<th>mean</th>
<th>&#963;</th>
<th>mean</th>
<th>&#963;</th>
<th>startup</th>
<th>approx.</th>
</tr>

<tr>
<td>meteor-contest&nbsp;&nbsp;</td>
<td>0.25s</td>
<td>0.03</td>
<td>0.13s</td>
<td>0.01</td>
<td>0.30s</td>
<td>0.13s</td>
</tr>

<tr>
<td>spectral-norm&nbsp;&nbsp;</td>
<td>4.03s</td>
<td>0.06</td>
<td>3.97s</td>
<td>0.03</td>
<td>4.07s</td>
<td>4.11s</td>
</tr>

<tr>
<td>pidigits&nbsp;&nbsp;</td>
<td>6.83s</td>
<td>0.04</td>
<td>6.77s</td>
<td>0.03</td>
<td>6.93s</td>
<td>6.76s</td>
</tr>

<tr>
<td>mandelbrot&nbsp;&nbsp;</td>
<td>11.77s</td>
<td>0.74</td>
<td>10.24s</td>
<td>0.18</td>
<td>11.10s</td>
<td>10.15s</td>
</tr>

<tr>
<td>binary-trees&nbsp;&nbsp;</td>
<td>19.96s</td>
<td>0.58</td>
<td>14.94s</td>
<td>0.43</td>
<td>19.64s</td>
<td>15.43s</td>
</tr>

<td>fannkuch&nbsp;&nbsp;</td>
<td>20.53s</td>
<td>1.31</td>
<td>17.87s</td>
<td>0.11</td>
<td>20.15s</td>
<td>17.96s</td>
</tr>

<tr>
<td>nbody&nbsp;&nbsp;</td>
<td>23.77s</td>
<td>0.04</td>
<td>24.06s</td>
<td>0.96</td>
<td>23.88s</td>
<td>23.88s</td>
</tr>

</table>


<p>Loading Java bytecode, profiling and dynamic compilation do take time but not enough time to make much of a difference in these examples (with the exception of meteor-contest).</p>

<p>The obvious differences show where there is a mismatch between program structure and JVM optimization - even though methods have been fully compiled the JVM continues using the on-stack-replacement. The opportunity to use the fully optimized compiled methods seems only to arise <em>the next time</em> the code block is invoked - whether that's in 10 seconds or 10 days.</p>

<p>To highlight that mismatch, "*Java 6 steady state" approximations are shown in the measurement tables alongside the usual measurements.</p>

</dd>

<dt><a href="#machine" name="machine">What machine are you running the programs on?</a></dt>
<dd>
<p>We use a quad-core 2.4Ghz Intel<sup>&#174;</sup> Q6600<sup>&#174;</sup> machine with 4GB of RAM and 250GB SATA II disk drive.</p>
<p>The old measurements used a single-processor 2.2Ghz AMD&#8482; Sempron&#8482; machine with 512MB of RAM and 40GB IDE disk drive; and a single-processor 2Ghz Intel<sup>&#174;</sup> Pentium<sup>&#174;</sup> 4 machine with 512MB of RAM and 80GB IDE disk drive.</p>
</dd>

<dt><a href="#os" name="os">What OS are you using on the test machine?</a></dt>
<dd><p>We use <strong>Ubuntu&#8482; 9.04 Linux</strong> Kernel 2.6.28-11-generic</p>

<p>The old measurements used <strong>Debian Linux</strong> 'unstable', Kernel 2.6.18-3-k7 and <strong>Gentoo Linux</strong> gentoo-sources-2.6.20-r6</p>
</dd>


<dt><a href="#kinder" name="kinder">Sometimes the children help with the measurements&#8230;</a></dt>
<dd><pre>
Broadcast message from root@hopper (Sun Oct  1 16:33:48 2006):

Power button pressed
The system is going down for system halt NOW!

Broadcast message from root@hopper (Sun Oct  1 16:33:48 2006):

Power button pressed
The system is going down for system halt NOW!

Broadcast message from root@hopper (Sun Oct  1 16:33:49 2006):

Power button pressed
The system is going down for system halt NOW!

Broadcast message from root@hopper (Sun Oct  1 16:33:49 2006):

Power button pressed
The system is going down for system halt NOW!

Broadcast message from root@hopper (Sun Oct  1 16:33:49 2006):

Power button pressed
The system is going down for system halt NOW!

Broadcast message from root@hopper (Sun Oct  1 16:33:50 2006):

Power button pressed
The system is going down for system halt NOW!
</pre>
</dd>




</dl>
</dd>





<dt><a href="#help" name="help">&nbsp;Where can I ask for help&#8230;?</a></dt>
<dd>
<dl>


<dt><a href="#aliothid" name="aliothid">Create an <strong>Alioth ID</strong> and login</a></dt>
<dd><p>We no longer accept anonymous comments - please <a href="http://alioth.debian.org/account/register.php"><strong>create an Alioth ID</strong></a> and login.</p>
<p>Ask questions or discuss the benchmarks in the <a href="http://alioth.debian.org/forum/?group_id=30402" title="Find Help, Share Opinions"><strong>discussion&nbsp;forums</strong></a>.</p>
</dd>

<dt><a href="#report" name="report">Where can I report bugs&#8230; request features?</a></dt>
<dd><p>Tell us about content mistakes, inconsistencies, bad installs <em>etc</em> - <a href="https://alioth.debian.org/tracker/?atid=411002&amp;group_id=30402&amp;func=browse"><strong>Report a Bug</strong></a>.</p> 
<p>Tell us about the latest language updates <em>etc</em> - add a <a href="https://alioth.debian.org/tracker/index.php?group_id=30402&amp;atid=411005"><strong>Feature Request</strong></a>.</p>
<p>We use <a href="http://www.andre-simon.de/">Andre Simon's highlight</a> to convert program source code to XHTML, please contribute better language definition files.</p>
</dd>



<dt>&nbsp;</dt>
<dd><p>Change the things you don't like - <em>convince us</em> that the change is a worthwhile improvement and then <em>expect to do all the work</em>.</p>
<p><strong>Be Nice!</strong> Maybe we'll reject the program. Maybe we'll prefer our own opinions. Maybe we'll decide not to change something.</p>
</dd>
</dl>
</dd>



<dt><a href="#implement" name="implement">&nbsp;How should I implement&#8230;?</a></dt>
<dd>
<dl>

<dt><a href="#implementp" name="implementp">How should I implement programs for the Benchmarks Game?</a></dt>
<dd><p>We prefer <strong>plain vanilla programs</strong> - after all we're trying to compare language implementations not programmer effort and skill. We'd like your programs to be easily viewable - so please format your code to fit in less than 80 columns (we don't measure lines-of-code!).</p>
<p>We also have a weakness for idiosyncratic, elegant, clever programs; and when they are too elegant to meet the requirements of the benchmark we <em>might</em> still show them in the <a href="faq.php#alternative">&darr;&nbsp;Interesting Alternative Programs</a> section.</p>
</dd>

<dt><a href="#correct" name="correct">How much effort should I put into getting the program correct?</a></dt>
<dd><p>Do design-iteration on your machine, or in a language newsgroup. Only Contribute Programs which give <strong>correct results</strong> on your machine - <strong>diff</strong> the program output with the provided output file. (Don't make-unnecessary-work for the committers.)</p>
<p>Leave it a couple of days, and then see if there are any <strong>minor improvements</strong> that you'd like to make, before you Contribute Programs to The Computer Language Benchmarks Game.</p> 
</dd>



<dt><a href="#datainput" name="datainput">How should I implement data-input?</a></dt>
<dd><p>Programs are measured across a range of input-values; programs are expected to either take a <strong>single command-line parameter</strong> or read text from <strong>stdin</strong>.</p> 
<p>(Look at what the other programs do.)</p>
</dd>

<dt><a href="#dataoutput" name="dataoutput">How should I implement data-output?</a></dt>
<dd><p>Programs should write to <strong>stdout</strong>. Program output is redirected to a log-file and diff'd with the expected output.</p>
<p>(Look at what the other programs do.)</p>
</dd>

<dt><a href="#brag" name="brag">How should I identify my program?</a></dt>
<dd><p>Include a header comment in the program like this:</p>
<pre>
/* The Computer Language Benchmarks Game
   http://shootout.alioth.debian.org/

   contributed by &#8230;
   modified by &#8230;
*/
</pre>
</dd>

<dt><a href="#split" name="split">How should I implement multiple source code files?</a></dt>
<dd>
<p>We use a simple script to <strong>split a single source file</strong> into multiple target source files.</p>
<p>One of the target source files <em>must</em> have the same filename as the original single source file, and is expected to be the 'main' program.</p>
<p>For example, the <a href="benchmark.php?test=nbody&amp;lang=se">Eiffel <em>nbody.e</em> source file</a> will be split into 3 target source files - <em>nbody.e, body.e, nbody_system.e</em> - 
each new target source file will start from the <strong>comment line</strong> which included the SPLITFILE=<em>target-filename</em> directive and run to the line preceding the next
 SPLITFILE=<em>target-filename</em> directive or end-of-file.</p>
<p>So, the new target source file <em>body.e</em> will start with the line</p>
<tt>-- SPLITFILE=body.e</tt>
<p>and end with the empty line following</p>
<tt>end -- class BODY</tt>
</dd>

<dt><a href="#unroll" name="unroll">How should I implement loops?</a></dt>
<dd><p>Don't manually unroll loops!</p></dd>

<dt><a href="#promo" name="promo">How should I advertise my company, services, website&#8230;?</a></dt>
<dd><p><strong>We'll remove any promos</strong> that you add as comment text, so please don't waste our time.</p> 
</dd>
</dl>
</dd>



<dt><a href="#contribute" name="contribute">&nbsp;How do I contribute a program?</a></dt>
<dd>
<dl>
<dd><p>There are many contributors and few committers - a little more time spent by contributors saves committers a great deal more time.</p>
<p>Attach the full source-code file of a tested program. Please don't paste source-code into the description field. Please don't contribute patch-files.</p>
<p>Before contributing programs</p>
<ul>
<li>read and accept the <a href="miscfile.php?file=license&amp;title=revised BSD license" title="Read the revised BSD license"><strong>Revised&nbsp;BSD&nbsp;license</strong></a> - all contributed programs are published under this revised BSD license.</li>
</ul>

<p>Follow these instructions <strong>step-by-step</strong></p>
<ol>
<li>Start from the bottom. <strong>Attach</strong> the program source-code file - do this first because it's easy to forget.</li>
<li>Say in the <strong>Description</strong> how this program fixes an error or is faster or was missing or &#8230; Give us reasons to accept your program.</li>
<li>Each <strong>Summary</strong> text <em><strong>must</strong></em> be unique! Follow this convention:<br />  
language, benchmark, your-name, date, (version)<br />
<em>Ruby nsieve Glenn Parker 2005-03-28</em><br />
</li>
<li><strong>Category</strong>: select the language implementation</li>
<li><strong>Group</strong>: select the benchmark</li>
<li>click the Submit button</li>
</ol>

<p>Now <strong>start from the bottom</strong> of the
   <a href="http://alioth.debian.org/tracker/?atid=411646&amp;group_id=30402&amp;func=browse"  title="Play the Benchmarks Game - Submit New">
   <strong>"Play the Benchmarks Game" Submit-New</strong></a> form and work your way up.
</p>
</dd>

<dt><a href="#status" name="status">How can I track what happens to the program I contributed?</a></dt>
<dd>

<p>You created an <a href="#aliothid">&darr;&nbsp;Alioth ID</a> with a valid email address so you'll receive email updates when your program is accepted and measured.</p>
</dd>

</dl>
</dd>



<dt><a href="#where" name="where">&nbsp;Where can I see&#8230;?</a></dt>
<dd>
<dl>

<dt><a href="#previous" name="previous">Where can I see previous programs?</a></dt>
<dd>
<p>Periodically we go through and remove slower programs from the website (if there's a faster program for the same language implementation). <strong>We don't remove those programs from the "Play the Benchmarks Game" tracker.</strong></p>
<p>You can see previous programs by browsing though the <a href="http://alioth.debian.org/tracker/?atid=411646&amp;group_id=30402&amp;func=browse"><strong>Play the Benchmarks Game tracker items</strong></a> and looking at the attached source code files. Log In with your Alioth Id, you will be able to create and save a query to search for particular tracker items.</p>
</dd>

<dt><a href="#seemore" name="seemore">Where can I see more about a <strong>Timeout</strong> or <strong>Error</strong>?</a></dt>
<dd>
<p>Sometimes a program may produce correct results, within the timeout, for smaller workloads - so check the data on the <a href="fulldata.php?test=recursive&amp;p1=ooc-0&amp;p2=se-0&amp;p3=gcc-0&amp;p4=gpp-0" title="full data"><strong>full data page</strong></a>.</p>
<p>You may find information about an Error in the 'build &amp; benchmark results' section of the program page.</p>
</dd>

<dt><a href="#version" name="version">Where can I see which language version was used?</a></dt>
<dd><p>You can see information about the language implementation, including the version number, at the bottom of each <a href="benchmark.php?test=all&amp;lang=gcc&amp;lang2=gcc#about" title="about the C gcc language"><strong>language comparison page</strong></a>.</p>
</dd>

<dt><a href="#options" name="options">Where can I see which compiler and runtime options were used?</a></dt>
<dd><p>You can see the build commands and runtime commands on each program page in the 
<a href="benchmark.php?test=recursive&amp;lang=gcc&amp;id=0#log" title="build &amp; benchmark results"><strong>build &amp; benchmark results</strong></a> section.</p>
</dd>

<dt><a href="#downsource" name="downsource">Where can I see more?</a></dt>
<dd><p>The <strong>project is hosted</strong> by <a href="http://alioth.debian.org/projects/shootout"  title="The Computer Language Benchmarks Game project page on Alioth FusionForge at Debian.org">Alioth&nbsp; FusionForge</a>.</p>
<p>You can <a href="http://alioth.debian.org/scm/?group_id=30402"  title="Browse the GComputer Language Benchmarks Game CVS tree">browse the CVS tree</a>.</p>
</dd>
</dl>
</dd>




<dt><a href="#whydont" name="whydont">&nbsp;Why don't you&#8230;?</a></dt>
<dd>
<dl>
<dt><a href="#contest" name="contest">Why don't you accept every program that gives the correct result?</a></dt>
<dd><p>We are trying to show the performance of various programming language implementations - so we ask that contributed programs not only give the
correct result, but also <strong>use the same algorithm</strong> to calculate that result.</p>
<p>Back in the day, Doug Bagley used both <em>same way</em> (same algorithm) and <em>same thing</em> (same result) benchmarks - so in many cases the performance
 differences were simply better algorithms.</p>
<p>After hearing many arguments, it seems <em>to me</em> that we should think of <em>same way</em> (same algorithm) tests as <strong>benchmarks</strong>, and
 we should think of <em>same thing</em> (same result) tests as <strong>contests</strong>.</p>
<p>At present, we show just one contest - <a href="benchmark.php?test=meteor&amp;lang=all">meteor-contest</a>.</p>
</dd>

<dt><a href="#acceptable" name="acceptable">Why don't you include language X?</a></dt>
<dd><p>Is the language implementation</p>
<ul>
<li><strong>Used?</strong> There are way too many dead languages and unused new languages - see <a href="http://people.ku.edu/~nkinners/LangList/Extras/langlist.htm">The Language List</a> and <a href="http://www.levenez.com/lang/">Computer Languages History</a></li>
<li><strong>Interesting?</strong> Is there something significant and interesting about the language, and will that be revealed by these simple benchmark programs? (But look closely and you'll notice that we sometimes include languages just because <em>we find them interesting</em>.)</li>
</ul>
<p>If that wasn't discouraging enough: in too many cases we've been asked to include a language implementation, and been told that of course programs would be contributed, but once the language didn't seem to perform as-well-as hoped no more programs were contributed. We're interested in the whole range of performance - not just in the 5 programs which show a language implementation at it's best.</p>
<p>We have no ambition to measure every Python implementation or every Haskell implementation or every C implementation - that's a chore for all you Python enthusiasts and Haskell enthusiasts and C enthusiasts, a chore which might be straightforward if you <a href="faq.php#measurementscripts">use our measurement scripts</a>.</p>
<p>We are unable to publish measurements for many commercial language implementations simply because their license conditions forbid it.</p>
<p>We will accept <strong>and reject</strong> languages in a capricious and unfair fashion - so ask if we're interested before you start coding.</p>
</dd>

<dt><a href="#measurementscripts" name="measurementscripts">Use our <strong>measurement scripts</strong> to make your own measurents!</a></dt>
<dd><p>The Python script "bencher does repeated measurements of program cpu time, elapsed time, resident memory usage, cpu load while a program is running - and summarizes those measurements" - <a href="http://alioth.debian.org/frs/?group_id=30402"><strong>download bencher</strong></a></p>

<p><strong>As an alternative</strong>, you should take a look at these Python measurement scripts designed for statistically rigorous Java performance evaluation - <a href="http://www.elis.ugent.be/JavaStats">JavaStats</a></p>
</dd>
</dl>
</dd>



<dt><a href="#useful" name="useful">&nbsp;What's it useful for?</a></dt>
<dd>
<dl>
<dd><p>You'll come across a range of uses for the programs and measurements:</p>
<ul>
<li>edge cases - <a href="http://ulf.wiger.net/weblog/wp-content/uploads/2009/01/damp09-erlang-multicore.pdf">"runs slower the more cores you throw at it" p22 (pdf)</a></li>
<li>implementor fun - <a href="http://www.mirandabanda.org/cogblog/2009/01/14/under-cover-contexts-and-the-big-frame-up/#comments">"we get worth-while speedups for everything except"</a></li>
<li>training a classifier - <a href="http://blog.chrislowis.co.uk/2009/01/04/identify-programming-languages-with-source-classifier.html">Identify Programming Languages with SourceClassifier</a></li>
<li>more comparisons - <a href="http://www.cs.purdue.edu/homes/sbarakat/cs456/Scripting.pdf">Performance of Scripting Languages (pdf)</a></li>
<li>performance testing - <a href="http://dromaeo.com/">Mozilla JavaScript performance testing</a></li>
<li>lighthearted asides - <a href="http://research.microsoft.com/~simonpj/papers/history-of-haskell/history.pdf">A History of Haskell: Being Lazy With Class (pdf)</a></li>
<li>diagnostics - <a href="http://smalltalk.gnu.org/project/issue/200">"awful memory usage with lots of big objects"</a></li>
<li>dispelling myths - <a href="http://ftp.openvms.compaq.com/openvms/journal/v10/openvms_journal.pdf">Java and OpenVMS: Myths and realities (pdf)</a></li>
<li>gaining perspective - <a href="http://openquark.org/svn/openquark/tags/1.4.0_0/OpenQuark/docs/CAL%20and%20the%20Computer%20Language%20Shootout%20Benchmarks.pdf">CAL and the Computer Language Benchmarks Game (pdf)</a></li>
<li>nostalgia - <a href="http://upsilon.cc/~zack/teaching/0607/labsomfosset/ocaml_hot.pdf">"we will show you 2004 data" (pdf)</a></li>
<li>even <a href="http://java.sys-con.com/read/358792.htm">learning a little about some uncommon programming languages</a>.</li>
</ul>
</dd>
</dl>
</dd>

</dl>






