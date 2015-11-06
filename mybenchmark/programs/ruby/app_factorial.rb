def fact(n)
  if (n > 1)
    n * fact(n-1)
  else
    1
  end
end

ary = ARGV.map{|s| s.to_i}

ary[0].times do 
	fact(1000)
end