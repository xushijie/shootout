#  Run a block 10 times, where the block creates 
#   5MB of 1K strings and 10 times that much garbage
#   Needs at least 250MB gemstone GEM_TEMPOBJ_CACHE_SIZE

ary = ARGV.map{|s| s.to_i}
num1 = 10
num2 = 20 

ary[0].times do
	  a = nil
	  num1.times do |i|
		a = Array.new(5000)
		a.length.times do |x|
		  str = ""
		  num2.times{|j| str << "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYy"}
		  a[x] = str
		  num1.times do |y|
			junk = ""
			num2.times{|k| str << "GaRbAgEGaRbAgEGaRbAgEGaRbAgEGaRbAgEGaRbAgEGaRbAgE_"}
	  end
	end
  end
end

