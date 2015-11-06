# The Computer Language Benchmarks Game
# $Id: uselinux.py,v 1.1 2012/12/29 19:19:31 igouy-guest Exp $

# =============================
# global variables
# =============================

nullName = '/dev/null'

# =============================
# initialize & configure
# =============================
import shlex
import fnmatch
import os
import subprocess
import resource
import os, sys, cPickle, time, threading, signal

from time import gmtime, strftime
from errno import EEXIST
from os.path import join
from subprocess import Popen
from domain import DataRecord
from threading import Timer

def measure(arg,commandline,delay,maxtime,
      outFile=None,errFile=None,inFile=None,logger=None,affinitymask=None):

   r,w = os.pipe()
   forkedPid = os.fork()

   if forkedPid: # read pickled measurements from the pipe
      os.close(w); rPipe = os.fdopen(r); r = cPickle.Unpickler(rPipe)
      measurements = r.load()
      rPipe.close()
      os.waitpid(forkedPid,0)
      return measurements
   
   else: 
      # Sample thread will be destroyed when the forked process _exits
      class Sample(threading.Thread):
         MAX_SAMPLE = 100
         def __init__(self,program):
            threading.Thread.__init__(self)
            self.setDaemon(1)
            self.timedout = False 
            self.p = program
            self.maxMem = 0
            self.childpids = None   
            self.memory=[]
            self.start() 

         def memory_usage_ps(self):
             try:
                 program =  subprocess.Popen(['ps', 'v', '-p', str(self.p)], stdout=subprocess.PIPE, stderr=subprocess.PIPE, close_fds=True)
                 out = program.communicate()[0].split(b'\n')
                 vsz_index = out[0].split().index(b'RSS')
                 mem = float(out[1].split()[vsz_index]) / 1024   # kb/1024
                 self.memory.append(mem)  
             except OSError, (e, err):
                # The subprocess Jruby might not be ready at this time, and I mark it as 0.
                print "OSError ", e, "  exception ",err
                self.memory.append(0)
 
         def run(self):
            try:              
               remaining = maxtime
               while remaining > 0: 
                  self.memory_usage_ps()
                  time.sleep(delay*5)                    
                  remaining -= delay
                  if len(self.memory) > self.MAX_SAMPLE:
                     remaining = 0
               else:
                  self.timedout = True
                  os.kill(self.p, signal.SIGKILL) 
            except OSError, (e,err):
               if logger: logger.error('%s %s',e,err)

       
      try:

         m = DataRecord(arg)
         m.timestamp = strftime("%a, %d %b %Y %H:%M:%S +0000", gmtime())

         # only write pickles to the pipe
         os.close(r); wPipe = os.fdopen(w, 'w'); w = cPickle.Pickler(wPipe)
         # spawn the program in a separate process
         p = Popen(commandline,stdout=outFile,stderr=errFile,stdin=inFile, close_fds=True, shell=True)

         # start a thread to sample the program's resident memory use
         t = Sample( p.pid )
         # wait for program exit status and resource usage
         rusage = os.wait4(p.pid, 0 )
         elapsed =rusage[2].ru_utime+ rusage[2].ru_stime
         # summarize measurements 
         if t.timedout:
            m.setTimedout()
         elif rusage[1] == os.EX_OK:
            m.setOkay()
         else:
            m.setError()

         m.maxMem = max(t.memory)
         m.elapsed = elapsed
         m.footprint= t.memory

      except KeyboardInterrupt:
         os.kill(p.pid, signal.SIGKILL)

      except ZeroDivisionError, (e,err): 
         if logger: logger.warn('%s %s',err,'too fast to measure?')

      except (OSError,ValueError), (e,err):
         if e == ENOENT: # No such file or directory
            if logger: logger.warn('%s %s',err,commandline)
            m.setMissing() 
         else:
            if logger: logger.error('%s %s',e,err)
            m.setError()       
   
      finally:
         w.dump(m)
         wPipe.close()

         # Sample thread will be destroyed when the forked process _exits
         os._exit(0)


def linkToSource(directory,filename,dstDir=None,srcFilename=None):
   # beware - read carefully
   src = join(directory,filename) \
      if srcFilename == None else join(directory,srcFilename)

   # tmpdir is $CWD
   dst = join(filename) if dstDir == None else join(dstDir,filename)

   try:
      os.symlink(src,dst)
   except OSError, (e,_):
      if e == EEXIST: pass # OK the symlink already exists - or should it be removed?

def linkToIncludeDir(directory,filename,dstDir=None,srcFilename=None):
   linkToSource(directory,filename)

#Creat a new directory for data under ddr target path: $targetpath/shijie
#@corepath: core file path  /tmp/shijie
#@datatargetpath: /tmp/datapath (ddrDataPath)
# 
def setupdirectory(corePath, datatargetpath):
   directoryName = os.path.basename(corePath)
   targetPath = os.path.join(datatargetpath, directoryName)

   if not os.path.exists(targetPath):
      try:

         os.makedirs(targetPath)
      except OSError as exception:
         if exception.errno != errno.EEXIST:
            raise

   return targetPath
   
# This function flushes command list to the cmd.ddr which will be used by dumpmethodhandle      
# The exception(NotExistingDirectory, NoPermission for writing) are ignored and will added in further
#@ddrDmpCommand:        dumpmethodhandle
#@ddrDataPath:          /tmp/shijie/binary_trees/ that is return valuye of setupDirectory
#@ddrBatchCommandFile:  /homes/sxu3/bin/cmd.ddr
def setupDDRBatchCommads(ddrDmpCommand, ddrDataPath, ddrBatchCommandFile):
   # Build commdn !dumpmethodhandle /tmp/../binary_trees/
   #              exit                
   s = []
   s.append(ddrDmpCommand)
   s.append(' ')
   s.append(ddrDataPath)
   s.append('/ ')
   s.append('\n')
   s.append('exit')
   fo = open(ddrBatchCommandFile,'wb')
   fo.write(''.join(s))
   fo.close()

def setupJDmpCommand(jdmpCmd, coreFile, batchCmd):
   s=[]
   s.append(jdmpCmd)
   s.append('  ')
   s.append('-core ')
   s.append('  ')
   s.append(coreFile)
   s.append('  ')
   s.append('-cmdfile  ')
   s.append(batchCmd)
   s.append('\n')
   cmd = ''.join(s)
   return cmd

def kill_proc(proc, timeout):
   timeout["value"] = True
   print 'kill proc ...'
   proc.kill()

     
def runDDRCommand(ddrcmd, ddrtargetDataPath, ddrBatchFile, ddrDmpCommand, corePath):
   #print  "runDDRCommad:"+ddrcmd
   #print  "runDDRCommad:"+ddrtargetDataPath
   #print  "runDDRCommad:"+ddrBatchFile
   #print  "runDDRCommad:"+ddrDmpCommand
   #print  "runDDRCommad:"+corePath
   
   for base, dirs, files in os.walk(corePath):
      for f in fnmatch.filter(files, 'core*.dmp'):
         targetPath = setupdirectory(corePath, ddrtargetDataPath)
         setupDDRBatchCommads(ddrDmpCommand, targetPath, ddrBatchFile)
         coreFile = os.path.join(base, f)
         cmd = setupJDmpCommand(ddrcmd, coreFile, ddrBatchFile)
         #ddrcmd = ddrcmd+"  "+ os.path.join(base, f)
         print "\n >>Start ddrcmd: "+ cmd

         try:
            args = shlex.split(cmd)
            # To avoid output mess of dumpmethodhandle, redirect output to DEVNULL
            DEVNULL = open(os.devnull, 'wb')
            proc=Popen(args, stdout=DEVNULL, stderr=subprocess.PIPE)
            timeout = {"value": False}
            # 30 seconds timeout
            timer = Timer(30 , kill_proc, [proc, timeout])
            timer.start()
            stdout, stderr = proc.communicate()
            timer.cancel()
         except KeyboardInterrupt:
            os.kill(p.pid, signal.SIGKILL)
            print 'Key board Interrupt exception caught '
         except (OSError,ValueError), (e,err):
            print 'OS Error Exception was caught ... Please check'
         #os.system.exit(0)
         print "\n\n"
