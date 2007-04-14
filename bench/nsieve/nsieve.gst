"* The Computer Language Shootout
    http://shootout.alioth.debian.org/
    contributed by Isaac Gouy
    modified by Eliot Miranda *"!
Object subclass: #Tests   instanceVariableNames: ''   classVariableNames: ''   poolDictionaries: ''   category: 'Shootout'!!Integer methodsFor: 'platform'!asPaddedString: width
   | s |
   s := self printString.
   ^(String new: (width - s size) withAll: $ ), s ! !!Tests class methodsFor: 'platform'!arg   ^Smalltalk arguments first asInteger! !!Tests class methodsFor: 'platform'!postscript   ^''! !!Tests class methodsFor: 'platform'!stdout   ^Transcript! !!Tests class methodsFor: 'benchmark scripts'!nsieve   | n |   n := self arg.   (n < 2) ifTrue: [n := 2].   self primeBenchmarkFor: n to: self stdout using: Array.   ^self postscript! !!Tests class methodsFor: 'benchmarking'!nsieve: n using: arrayClass    | count isPrime |   count := 0.   isPrime := arrayClass new: n withAll: true.   2 to: n do:      [:i |       (isPrime at: i) ifTrue:          [i + i to: n by: i do:            [:k | isPrime at: k put: false].         count := count + 1]].   ^count! !!Tests class methodsFor: 'benchmarking'!primeBenchmarkFor: v to: output using: arrayClass   v to: v - 2 by: -1 do:      [:n| | m |      m := (2 raisedTo: n) * 10000.      output         nextPutAll: 'Primes up to '; nextPutAll: (m asPaddedString: 8);         nextPutAll: ((self nsieve: m using: arrayClass) asPaddedString: 9);          nextPut: Character lf]! !


Tests nsieve !
