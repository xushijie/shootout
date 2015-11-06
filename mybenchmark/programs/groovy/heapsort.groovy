/*
	The Computer Language Shootout
	http://shootout.alioth.debian.org/

	contributed by Jochen Hinrichsen
*/

//Stuff removed here - awful random generator.
//Heapsort is the same O(log n) time regardless of the 
//order.

    def heapsort(int n, double[] ra) {
		int l, j, ir, i
		double rra

		l = (n >> 1) + 1
		ir = n
		while (true) {
		    if (l > 1) {
				rra = ra[--l]
		    } else {
				rra = ra[ir]
				ra[ir] = ra[1]
				if (--ir == 1) {
				    ra[1] = rra
				    return
				}
		    }
		    i = l
		    j = l << 1
		    while (j <= ir) {
				if (j < ir && ra[j] < ra[j+1]) { ++j }
				if (rra < ra[j]) {
				    ra[i] = ra[j]
				    j += (i = j)
				} else {
				    j = ir + 1
				}
		    }
		    ra[i] = rra
		}
    }

def N = (args.length == 0) ? 1000 : args[0].toInteger()
def nf = java.text.NumberFormat.getInstance()
nf.setMaximumFractionDigits(10)
nf.setMinimumFractionDigits(10)
nf.setGroupingUsed(false)
double []ary = (double[]) java.lang.reflect.Array.newInstance(double.class, N+1)
for (i in 0..<N) {
    ary[i] = 10.0
}
heapsort(N, ary)
println nf.format(ary[N])

// EOF

