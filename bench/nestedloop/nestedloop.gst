"  The Great Computer Language Shootout
   contributed by Isaac Gouy

   To run: gst -Q nestedloop.st -a 16
"

| n count |
n := (Smalltalk arguments at: 1) asInteger.

count := 0.
n timesRepeat: [
   n timesRepeat: [
      n timesRepeat: [
         n timesRepeat: [
            n timesRepeat: [
               n timesRepeat: [count := count + 1] ] ] ] ] ].

count displayNl !