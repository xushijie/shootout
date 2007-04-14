"* The Computer Language Shootout
    http://shootout.alioth.debian.org/
    contributed by Isaac Gouy
    modified by Eliot Miranda *"!

Object subclass: #Tests	instanceVariableNames: ''	classVariableNames: ''	poolDictionaries: ''	category: 'Shootout'!!Float methodsFor: 'printing'!printOn: aStream withName: aString   aStream  nextPutAll: (self asStringWithDecimalPlaces: 9);      nextPut: Character tab; nextPutAll: aString; nextPut: Character lf.! !!Float methodsFor: 'platform'!asStringWithDecimalPlaces: anInteger   | n s |
   n := 0.5d * (10 raisedToInteger: anInteger negated).
   s := ((self sign < 0) ifTrue: [self - n] ifFalse: [self + n]) printString.
   ^s copyFrom: 1 to: (s indexOf: $.) + anInteger ! !!Tests class methodsFor: 'benchmarking'!partialsums: n to: output   | a1 a2 a3 a4 a5 a6 a7 a8 a9 twothirds alt |   a1 := a2 := a3 := a4 := a5 := a6 := a7 := a8 := a9 := 0.0d0.   twothirds := 2.0d0/3.0d0.   alt := -1.0d0.   1.0d0 to: n do: [:k| | k2 k3 sk ck |      k2 := k*k.      k3 := k2*k.      sk := k sin.      ck := k cos.      alt := -1.0d0 * alt.      a1 := a1 + (twothirds raisedTo: k - 1.0d0).      a2 := a2 + (k raisedTo: -0.5d0).      a3 := a3 + (1.0d0/(k*(k+1.0d0))).      a4 := a4 + (1.0d0/(k3*sk*sk)).      a5 := a5 + (1.0d0/(k3*ck*ck)).      a6 := a6 + (1.0d0/k).      a7 := a7 + (1.0d0/k2).      a8 := a8 + (alt/k).      a9 := a9 + (alt/(2.0d0*k - 1.0d0))].   a1 printOn: output withName: '(2/3)^k'.   a2 printOn: output withName: 'k^-0.5'.   a3 printOn: output withName: '1/k(k+1)'.   a4 printOn: output withName: 'Flint Hills'.   a5 printOn: output withName: 'Cookson Hills'.   a6 printOn: output withName: 'Harmonic'.   a7 printOn: output withName: 'Riemann Zeta'.   a8 printOn: output withName: 'Alternating Harmonic'.   a9 printOn: output withName: 'Gregory'.   ^''! !!Tests class methodsFor: 'platform'!arg   ^Smalltalk arguments first asInteger! !!Tests class methodsFor: 'platform'!postscript   ^''! !!Tests class methodsFor: 'platform'!stdout   ^Transcript! !!Tests class methodsFor: 'benchmark scripts'!partialsums   self partialsums: self arg asDouble to: self stdout.   ^self postscript! !


Tests partialsums !
