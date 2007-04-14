"* The Computer Language Shootout
    http://shootout.alioth.debian.org/
    contributed by Isaac Gouy
    modified by Eliot Miranda *"!

Object subclass: #Tests	instanceVariableNames: ''	classVariableNames: ''	poolDictionaries: ''	category: 'Shootout'!!Array methodsFor: 'benchmarking'!multiplyAtAv   ^(self multiplyAv) multiplyAtv! !!Array methodsFor: 'benchmarking'!multiplyAtv   | n atv |   n := self size.   atv := Array new: n withAll: 0.0d0.   1 to: n do: [:i| 	      1 to: n do: [:j|         atv at: i put: (atv at: i) + ((j matrixA: i) * (self at: j)) ]].   ^atv! !!Array methodsFor: 'benchmarking'!multiplyAv   | n av |   n := self size.   av := Array new: n withAll: 0.0d0.   1 to: n do: [:i| 	      1 to: n do: [:j|         av at: i put: (av at: i) + ((i matrixA: j) * (self at: j)) ]].   ^av! !
!Float methodsFor: 'platform'!asStringWithDecimalPlaces: anInteger   | n s |
   n := 0.5d * (10 raisedToInteger: anInteger negated).
   s := ((self sign < 0) ifTrue: [self - n] ifFalse: [self + n]) printString.
   ^s copyFrom: 1 to: (s indexOf: $.) + anInteger ! !
!SmallInteger methodsFor: 'benchmarking'!matrixA: anInteger"fixup one-based indexing to zero-based indexing - cleanup later"   | i j |   i := self - 1.    j := anInteger - 1.   ^1.0d0 / (i + j * (i + j + 1) /2  + i + 1) asFloat! !!Tests class methodsFor: 'benchmarking'!spectralnorm   self stdout      nextPutAll: (self spectralnorm: self arg);      nextPut: Character lf.   ^self postscript! !!Tests class methodsFor: 'benchmarking'!spectralnorm: n   | u v vBv vv |   u := Array new: n withAll: 1.0d0.   v := Array new: n withAll: 0.0d0.   10 timesRepeat:      [v := u multiplyAtAv.       u := v multiplyAtAv].   vBv := 0.0d0.   vv := 0.0d0.   1 to: n do:      [:i |       vBv := vBv + ((u at: i) * (v at: i)).       vv := vv + ((v at: i) * (v at: i))].   ^((vBv / vv) sqrt asStringWithDecimalPlaces: 9)! !!Tests class methodsFor: 'platform'!arg   ^Smalltalk arguments first asInteger! !!Tests class methodsFor: 'platform'!postscript   ^''! !!Tests class methodsFor: 'platform'!stdout   ^Transcript! !


Tests spectralnorm !
