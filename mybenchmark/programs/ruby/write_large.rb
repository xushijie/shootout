content = "a"*1000 	#sentence
multiplier = 1000 	#how many times the sentence will be written
fname = File.dirname(__FILE__) + "/temp.output"

####### RUNNER #######
ary = ARGV.map{|s| s.to_i}

ary[0].times do
	File.open(fname, "w") do |file|
		multiplier.times {
			file.write content
		}
	end
end

File.delete fname