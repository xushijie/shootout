"* The Computer Language Benchmarks Game
    http://shootout.alioth.debian.org/
    adapted from a program by Paolo Bonzini 
    contributed by Isaac Gouy *"!

Object subclass: #Thread

!Thread methodsFor: 'accessing'!
name: anInteger

!Thread methodsFor: 'accessing'!
nextThread: aThread

!Thread methodsFor: 'accessing'!

!Thread methodsFor: 'accessing'!

!Thread methodsFor: 'accessing'!
fork

!Thread methodsFor: 'accessing'!
run 
   [ self tokenNotDone ] whileTrue: [ nextThread takeToken: token - 1 ].
   Tests stdout print: name; nl ! !

!Thread methodsFor: 'accessing'!


!Thread class methodsFor: 'instance creation'!
   ^self basicNew semaphore: Semaphore new ! !

!Thread class methodsFor: 'instance creation'!


!Tests class methodsFor: 'benchmarking'!
   503 to: 1 by: -1 do: [:i| 
      first := Thread named: i next: first.
      last isNil ifTrue: [ last := first ].
   ].
   last nextThread: first.

!Tests class methodsFor: 'benchmarking'!
