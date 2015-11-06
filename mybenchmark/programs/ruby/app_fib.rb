def fib(n)
  if (n < 2)
    n
  else
    fib(n-1) + fib(n-2)
  end
end

ary = ARGV.map{|s| s.to_i}
ary[0] ||= 1

ary[0].times do 
	fib(38)
end

#commandline: ruby bm_app_fib.rb arg1 arg2
#arg1 is the number of times the test should be run, arg2 is the fibbonacci number being calculated
#default is one run calculating the 38th fibonacci number (calibrated to ~5sec on Java HotSpot Server at time of writing)
