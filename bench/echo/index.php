<!--#set var="TITLE" value="Echo Client/Server" -->
<!--#set var="KEYWORDS" value="performance, benchmark, 
computer, language, compare, cpu, memory, sockets, echo client,
echo server" --> 

<?php require("../../html/testtop.php");
      testtop("Echo Client/Server"); ?>

<h4>About this test</h4>
<p>For this test, each program should be implemented to do the <a
  href="../../method.php#sameway"><i>same thing</i></a>, following
  the rules below:</p>
<p>Each test program runs a single-threaded server process that listens
  on an Internet socket.  When the server starts, it forks a separate
  client process that connects back to the server's socket.  Then the
  server loops, receiving data and echoing it back to the client until
  the client closes its socket.  When it is finished, the server reports
  how many bytes were processed.  The client checks each echo request
  sent against the data received from the server to make sure it is
  correct before the next request is made.  Each echo request consists
  of 19 characters including a terminating newline.</p>
<p>Each client must do the following for N iterations:
<code><pre>
  send 19 bytes
  recv 19 bytes
  check reply == request
  repeat
</pre></code></p>
<p>The read/write operations on the stream socket should either use
  line-oriented standard I/O functions or else handle incomplete
  reads/writes.</p>

<p>The reason for using fork is simply to make it easy for the test
  driver, so it only has to start one process.</p>
<p>We make an exception for Java, and allow it to use multiple threads
  instead of forking.  Similarly, Brian Gregor has contributed a
  threaded version for Haskell.</p>
<p>In real life, you might use a small client/server like this to test
  network latency (it's not a throughput test).</p>

<h4>Observations</h4>
<p>The <a href="echo.tcl">Tcl program</a> that implements this test
  doesn't call the wait() system call, so I cannot measure the child
  process CPU as I normally do.  I've worked around this by using a
  bash <a href="tclwrapper">wrapper</a> script that starts the Tcl
  script as 2 separate client and server subprocesses.</p>

<h4><a href="alt/">Alternates</a></h4>
<p><i>This section is for displaying alternate solutions that are either
  slower than ones above or perhaps don't quite meet my criteria for
  the competition, but are otherwise worthy of comment.</i>
<ul>
  <li>If you wanted to do more of a throughput (network throughput, not
  benchmark throughput) test, take a look at the two examples: <a
  href="alt/echo.perl2.perl">perl2</a> and <a href=
  "alt/echo.pike2.pike">pike2</a>.  These programs send multiple
  requests at once.</li>
</ul>

  </tr>
</table>
<?php require("../../html/footer.php"); ?>
