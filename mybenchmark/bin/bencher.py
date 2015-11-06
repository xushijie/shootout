#!/usr/bin/python
#TODO:  fix all the "nicename" stuff into something more coherent

#=======
# imports
#=======

import sys
import re
import os
import json
from domain import FileNameParts

from subprocess import STDOUT, call
from time import strftime
from os import makedirs, walk, chdir, getcwd
from os.path import expanduser, expandvars, normpath, isdir, join, realpath, \
	getmtime, isfile, getsize, split, splitext, relpath, basename, abspath, dirname
from shutil import copy

from ConfigParser import ConfigParser, NoSectionError, NoOptionError

import csv 
import operator
import math

#=======
# platform-specific imports
#=======

if sys.platform == 'win32':
	from usewin32 import nullName, linkToSource, linkToIncludeDir, measure
else:
	from uselinux import nullName, linkToSource, linkToIncludeDir, measure, runDDRCommand


#if sys.platform == 'win32':
#	from usewin32 import nullName, linkToSource, linkToIncludeDir, measure
#else:
#	from uselinux import nullName, linkToSource, linkToIncludeDir, measure
	
#=======
# global variables 
#=======

#command-line options
#TODO: make actually functional... 
verbose = True
measure_languages = None
measure_exts = None
measure_tests = None

#today's date-folder
timefoldername = None

#default directories
dirs = {}
dirnames = {}
tmpdirnames = ['code','out','err']

#directory and filenames derived from file structures
testdirs = {}
filteredfiles = []


#jvm
java_home = 'JAVA_HOME'		#for now, these are fine for both windows and 'nix
default_path = 'PATH'
currentJVM = None
savedenviron = {}

#default argument value
defaultarg = 0

# from config file
jvms = {}
extensions = {}
commandlines = {}
testvalues = {}
filters = {}
ddroptions= {}

delay = None
maxtime = None
repeat = None
outfile=None
# ddrcmd = None

excludedfiles = []


#Result  is JSON Dictionary 
result={}
sampling=1


#=======
# default values
#=======

def setDefaultDirectories():
	global dirs
	cwd = realpath(sys.argv[0])

	bencher = split( split(cwd)[0] )[0]
	dirnames['bencher'] = bencher
	dirs['bencher'] = bencher if isdir(bencher) else None

	d = join(bencher,'tmp')
	dirnames['tmp'] = d
	dirs['tmp'] = d if isdir(d) else None

	d = join(bencher,'programs')
	dirnames['programs'] = d
	dirs['programs'] = d if isdir(d) else None

	d = join(bencher,'makefiles')
	dirnames['makefiles'] = d
	dirs['makefiles'] = d if isdir(d) else None

	d = join(bencher,'summary')
	dirnames['summary'] = d
	dirs['summary'] = d if isdir(d) else None

	d = join(bencher,'logs')
	dirnames['logs'] = d
	dirs['logs'] = d if isdir(d) else None

def defaultIni():
	return defaultSettingsFile('ini')

def defaultMakefile():
	return defaultSettingsFile('Makefile')

def defaultSettingsFile(ext):
	f = 'my.win32.' if sys.platform == 'win32' else 'my.linux.'
	# check default location
	cwd = realpath(sys.argv[0])
	d = split( split(cwd)[0] )[0]
	default = join(d,'makefiles',f+ext)
	return default if isfile(default) else None
	
def setTimeFolderName():
	global timefoldername
	timefoldername = strftime('%Y-%m-%d--%H.%M.%S')

#=======
# read from config
#=======

def parseIniFile(ini):
	global jvms,extensions,commandlines,excludedfiles,delay,repeat,maxtime,outfile,sampling,ddroptions

	try:
		parser = ConfigParser()
		parser.read(ini)
		
		for k,v in parser.items('jvms'):
			jvms[k] = normpath(v)
			
		for k,v in parser.items('extensions'):
			extensions[k] = v.split(' ')
			
		for k,v in parser.items('commandlines'):
			commandlines[k] = v

		for k,v in parser.items('filters'):
			filters[k] = v
			excludedfiles = filters['excluded']
		
		for k,v in parser.items('testvalues'):
			testvalues[k] = v
		
		for k,v in parser.items('ddroptions'):
			ddroptions[k] = v
		
			
		
		s = 'options'
		for o in parser.options(s):
			if o in ('delay'):
				delay = parser.getfloat(s,o)
			elif o in ('maxtime'):
				maxtime = parser.getint(s,o)
			elif o in ('repeat'):
				repeat = parser.getint(s,o)
			elif o in ('outfile'):
				outfile=parser.get(s,o)
			elif o in ('sampling'):
				sampling=parser.getint(s,o)
		
		#s = 'ddroptions'
		#for k,v in parser.items('ddroptions'):
		#	print k+':'+v
		#	if k == 'ddrcmd':
		#		ddrcmd = v;
		#print '       ********'+ddrcmd
		#sys.exit(0)
	except (NoSectionError,NoOptionError), e:
		if logger: logger.debug(e)
		print e, 'in', realpath(ini)
		sys.exit(2)
		
		
#=======
# setup methods
#=======

# file stuff
def _getAllFiles():
	allfiles = []

	for dirpath,_,filenames in walk(dirs['programs']):
		for f in filenames:
			allfiles.append(abspath(join(dirpath, f)))
	
	return allfiles
	
def setFilteredFiles():
	global filteredfiles 
	
	allfiles = _getAllFiles()
	
	for f in allfiles:
		fnp = FileNameParts(f)
		if extensions.has_key(fnp.imp) and (basename(fnp.programName) not in excludedfiles):
			filteredfiles.append(f)

# directory stuff
def _ifNoneMkdir(d):
	if not isdir(d):
		makedirs(d)

def _getAllTmpDirNames():
	global testdirs
	for root,dir,filenames in walk(dirs['programs']):
		for f in filenames:
			topname = basename(abspath(root))
			if FileNameParts(f).imp in extensions:
				nicename = f.split('.')[0]
				if testdirs.has_key(topname):
					testdirs[topname].append(nicename)
				else:
					testdirs[topname] = [nicename]

#todo: don't make directories of tests thave have been filtered out 					
def makeAllTmpDirs():
	_getAllTmpDirNames()
	for lang,testlist in testdirs.iteritems():
		for test in testlist:
			for subdir in tmpdirnames:
				d = join(dirs['tmp'],timefoldername,lang, test, subdir)
				_ifNoneMkdir(d)

def copyCodeIntoTmpDirs():
	for f in filteredfiles:
		nicename = basename(f).split('.')[0]
		g = join(dirs['tmp'],timefoldername,basename(dirname(f)), nicename, tmpdirnames[0])
		copy(f,g)

def getDirFromFileName(f):
	nicename = basename(f).split('.')[0]
	out = join(dirs['tmp'],timefoldername,basename(dirname(f)),nicename)
	return out

	
#=======
# build command lines
#=======

#This builds a basic commandline.

def getArg(p):
	nicename = basename(p.programName)
	if nicename in testvalues:
		return testvalues[nicename]
	else:
		return -1


def buildCmd(p, template,a):

	nicename = basename(p.programName)

	specials = {}
	specials['%X'] = nicename 
	specials['%T'] = p.name
	specials['%B'] = p.baseName
	specials['%A'] = a
	cmd = commandlines[template]
	
	#regex !!
	for m in re.finditer('\$[\w]+' ,cmd):
		k = m.group(0)
		v = os.environ.get( k.lstrip('$'), '' )
		cmd = re.sub('\\' + k + '(?P<c>[\W])', v + '\g<c>', cmd) # ate [\W] !
	
	for m in re.finditer('\%[XTBA]',cmd):
		value = specials.get( m.group(0), '' )
		cmd = re.sub('\\' + m.group(0), value, cmd)
		
	return cmd
	

#=======
# create working list
#=======

# Returns a worklist dictionary.  Intended to build a worklist PER JVM.
# The dictionary contains tests if and only if they are to be measured by the bencher.
# The key for each entry is the FileNameParts of the file that is to be run.
# The value is a list containing information necessary to the execution of the file.
# 
# Firstly, filter out tests that should not be run.
# Then, from cross-referencing the ini, create the work instructions.
# cmd:		the command builder (or builders) for this test.
# args:		list of arguments to be passed through the command builder.


def createWorklist():
	worklist = {}
	
	for f in filteredfiles:
		fnp = FileNameParts(f)
		commandlinebuilders = extensions[fnp.imp]
		
		try: 
			argument = testvalues[basename(fnp.filename)]
		except KeyError:
			argument = defaultarg
		
		worklist[fnp] = commandlinebuilders
	
	return worklist
		

#=======
# JVM-related functions
#=======		

def saveDefaultPath():
	global savedenviron
	savedenviron[default_path] = os.environ[default_path]

#TODO: make this meatier, for now it works
def switchToJVM(j):
	global currentJVM
	
	os.environ[java_home] = jvms[j]
	
	# set back to default path, then add on JVM stuff- this keeps path from getting enormous
	os.environ[default_path] = savedenviron[default_path]
	os.environ[default_path] = os.environ[java_home] + os.path.sep + 'bin' + os.pathsep + os.environ[default_path]
	currentJVM = j
	if verbose:
		print '\n=========== switched to jvm ' + currentJVM + '==========='



#=======
# CSV 
#=======

datfile = 'all_measurements.csv'
scorefile = 'filtered_measurements.csv'
headers = 'test name,jvm,language,maxmem,status,cpuload,elapsed\n'
	
def makeDatFile():
	cwd = getcwd()
	chdir(join(dirs['tmp'],timefoldername))
	
	with open(datfile,'w') as f:
		f.write(headers)
		
	chdir(cwd)

def logToCSV(CSVin,row):
	cwd = getcwd()
	chdir(join(dirs['tmp'],timefoldername))
	with open(CSVin,'a') as f:
		CSVwriter = csv.writer(f, delimiter=',',lineterminator='\n',quotechar='|',quoting=csv.QUOTE_MINIMAL)
		CSVwriter.writerow(row)
	chdir(cwd)
	
def formatStringForCSV(str,p,t):
	workwith = str.split(',')
	#TODO: could be better, but right now we don't care about these three values (arg, gz, cputime in that order)... the first two are legacy.
	#Would be better if measure returned a list, but that'll need to be worked on later.
	workwith[0] = basename(p.programName)
	workwith[1] = currentJVM
	workwith[2] = t
	return workwith

#=======
# CSV score processing
#=======

#default column locations for values (leftmost is testname, etc)
COL_TESTNAME = 0
COL_JVM = 1
COL_LANG = 2
COL_STATUS = 4
COL_TIME = 6

#utility itemgetter
test_name = operator.itemgetter(COL_TESTNAME)
jvm = operator.itemgetter(COL_JVM)
lang = operator.itemgetter(COL_LANG)
exit_status = operator.itemgetter(COL_STATUS)
run_time = operator.itemgetter(COL_TIME)

def geomean(n):
	try:
		return (reduce(operator.mul, n, 1))**(1.0/len(n))
	except ZeroDivisionError:
		return 'Inf'
	
#TODO: it would be really nice if i could make this more generic by allowing functions to be passed in arbitrarily
#TODO:  also, filtered_rows has the potential to get really big and I should probably read/write together
def filterCSV(CSVin, CSVout, method='fastest'):
	is_header = True
	
	filtered_rows = []		#these are actually the exact rows that will be written to the new CSV
	gathered_rows = []		#there are the running rows for the current combination of jvm,lang,test (aka combo)
	running_combo = []		#this is the running combo.  would probably make more sense as a frozenset but the order never changes anyway

	with open(CSVin, 'r') as f:
		CSVreader = csv.reader(f, delimiter=',',lineterminator='\n',quotechar='|')
		
		# discard header
		for row in CSVreader:
			if is_header:
				is_header = False
				continue
				
			else:
				#find the times for every combination of test, jvm, lang (AKA combo)
				this_row_combo = [test_name(row), jvm(row) + lang(row)]
				
				if (this_row_combo == running_combo):						#this row is measuring the same combo as the last row
					gathered_rows.append(row)								#just grab up the whole row
					
				else:														#this row is measuring a new combo (or is the first row)
					if (gathered_rows):										#if it isn't the first row, grab the times and pick which to output
						gathered_rows.sort(key=run_time)
						if method == 'fastest':
							filtered_rows.append(gathered_rows[0])
						if method == 'median':
							filtered_rows.append(gathered_rows[int(len(gathered_rows)/2)]) 	#TODO: .... isn't technically the median, fix later
						gathered_rows[:] = []	#clear list	
					
					#regardless of whether it's the first row, set a new combo and append the first result
					
					running_combo = this_row_combo
					gathered_rows.append(row)


	with open(CSVout, 'w') as f:
		CSVwriter = csv.writer(f, delimiter=',',lineterminator='\n',quotechar='|')
		for row in filtered_rows:
			CSVwriter.writerow(row)	

	
	
#=======
# measurement
#=======

def measureAllWorklist(worklist, jvm):
	w = worklist
	cwd = getcwd()
	for k,value in w.iteritems():
		for t in value:
			a = getArg(k)
			if a is -1:
				continue
			
			cmd = buildCmd(k,t,a)

			if verbose: sys.stdout.write('measuring ' + basename(k.programName) + ' with ' + t + ' ')
			
			#change to clean tmp directory every program
			tmpdir = getDirFromFileName(k.programName)
			chdir(join(tmpdir,tmpdirnames[0]))
			nicename = basename(k.name).split('.')[0]
			print ' >>> Runng ', cmd, " and repeat: ",repeat, ' and jvm: ', jvm 
			with open(join(tmpdir,tmpdirnames[1],(nicename + '_' + t + currentJVM + '_OUT')), 'a+') as writeout:				#this would be nicer but for some reason our server runs python 2.7
				with open(join(tmpdir,tmpdirnames[2],(nicename + '_' + t + currentJVM + '_ERR')), 'a+') as errout:				#so that's fun
					for n in range(repeat):
						m = measure(a,cmd,delay,maxtime,outFile=writeout,errFile=errout,inFile=None,logger=None,affinitymask=None)
						#runDDRCommand(ddroptions['ddrcmd'], ddroptions['ddrdatapath'], ddroptions['ddrbatchfile'],ddroptions['ddrdmpcommand'], tmpdir)
						print "measurement=", m, ' and t=', t
						if verbose: sys.stdout.write('.')
						if verbose and n >= (repeat-1): sys.stdout.write('\n')
						
						if nicename in result:
							datas = result[nicename]
							datas[t]=m
						else:
							datas ={}
							datas[t] = m
							result[nicename]=datas
	chdir(cwd)
	#system.exit(0)
	#sys.exit(0)
def measurePerJVM():
	for JVM in jvms:
		switchToJVM(JVM)
		worklist = createWorklist()
		measureAllWorklist(worklist, JVM)

#=======
# setup and post-processing
#=======

def doSetup():
	
	setDefaultDirectories()
	setTimeFolderName()
	
	ini = defaultIni()
	parseIniFile(ini)
	
	setFilteredFiles()
	makeAllTmpDirs()
	copyCodeIntoTmpDirs()
	
	saveDefaultPath()
	
	makeDatFile()



def plotElapsedDis(axis, jvm1, jvm2, ylabel, title, name):
	import matplotlib.pyplot as plt
	import numpy as np
	#fig, ax = plt.subplots(111)
	fig = plt.figure()
	ax = fig.add_subplot(111)
        ## the data
	N = len(jvm1)
	#menMeans = [18, 35, 30, 35, 27]
        #womenMeans = [25, 32, 34, 20, 25]
	ind = np.arange(N)+1
	width = 0.25                      # the width of the bars

	rects1 = ax.bar(ind-width, jvm1, width, color='white', edgecolor='black', hatch="*")

	rects2 = ax.bar(ind, jvm2, width, color='white', edgecolor='black', hatch='//')

	ax.set_ylabel(ylabel)
	ax.set_title(title)
	plt.xticks(ind, axis, rotation=-85)
	ax.legend( (rects1[0], rects2[0]), ('Originl', 'Optimal') )
	fig.tight_layout() # make sure it fits
	plt.savefig(name)
	plt.close()
	#plt.show()

def anotherplotElapsedDis(axis, jvm1, jvm2, ylabel, title, name):
    import matplotlib.pyplot as plt
    import numpy as np
    #fig, ax = plt.subplots(111)
    fig = plt.figure()
    ax = fig.add_subplot(111)
        ## the data
    N = len(jvm1)
    #menMeans = [18, 35, 30, 35, 27]
        #womenMeans = [25, 32, 34, 20, 25]
    ind = np.arange(N)+1
    width = 0.25                      # the width of the bars

    # add "hatch"
    rects1 = ax.bar(ind-width, jvm1, width, color='white', edgecolor='black', hatch="*")

    rects2 = ax.bar(ind, jvm2, width, color='white', edgecolor='black', hatch='//')

    ax.set_ylabel(ylabel)
    ax.set_title(title)
    plt.xticks(ind , axis, rotation=90)
    ax.legend( (rects1[0], rects2[0]), ('Originl', 'Optimal') )
    fig.tight_layout() # make sure it fits
    plt.savefig(name)
    plt.close()

    #plt.show()


	
def doPost():
	global outfile, sampling
	'Dump the data result to external data in JSON or other format'
	print '=============Processing result =========================\n'
	
	if sampling == 0:
		print "Loading the result data from ", outfile
		with open(outfile) as data_file:
			result=json.load(data_file)
	else:
	     #1, json to output file. 
		with open(outfile, 'w') as output:
			json.dump(result, output, indent=4, sort_keys=True, default=lambda o: o.__dict__)			
			print "The result has been saved to "+outfile

	#2, Draw the figures.
	import numpy as np
	import matplotlib.pyplot as plt



	y_jvm1=[]
	y_jvm2=[]
	
	y_maxMem1=[]
	y_maxMem2=[]
	print "Now it is on drawing memory footprint.. "

	for testid,sample in result.iteritems():
		#2.1,  memory footprint
		

		keys = list(extensions['rb'])
		measure1 = sample[keys[0]]['footprint']
		measure2 = sample[keys[1]]['footprint']
		x=np.arange(0.0, len(measure1))*delay
		
		plt.plot( x, measure1, 'k-', label=keys[0])
		plt.plot( np.arange(0.0, len(measure2))*delay, measure2, 'k:', label=keys[1])
		legend = plt.legend(loc='upper center', shadow=True)

		plt.xlabel("time")
		plt.ylabel("memory (MB)")
		name = '../tmp/'+testid+'.eps'
		plt.savefig(name)
		plt.close()
		

		#2.2 Construct another y1 and  y2 list
		y_jvm1.append(sample[keys[0]]['elapsed'])
		y_jvm2.append(sample[keys[1]]['elapsed'])

		y_maxMem1.append(sample[keys[0]]['maxMem'])
		y_maxMem2.append(sample[keys[1]]['maxMem'])

	print 'Now it is on drawing bar chart for CPU elapsed and max memory.. Result is on ../tmp/'
	plotElapsedDis(result.keys(), y_jvm1, y_jvm2, 'seconds', 'CPU Elapsed', '../tmp/cpu_elapsed.eps')
	plotElapsedDis(result.keys(), y_maxMem1, y_maxMem2, 'Max Memory(MB)', 'The max memory occupied', '../tmp/maxmem.eps')
		
	print "Complete ..."


#=======
# main
#=======

def main():
	print '\n=========== benchmarker version 0.9 ==========='
	print 'setting up ...'
	doSetup()
	print 'test information in ' + join(dirs['tmp'],timefoldername+ ' sampling: ', str(sampling))
	if sampling == 1:
		measurePerJVM()
	
	doPost()
	
	
#=======
# AND GO
#=======

main()

#signature for personal reference
#measure(arg,commandline,delay,maxtime,
#      outFile=None,errFile=None,inFile=None,logger=None,affinitymask=None)
