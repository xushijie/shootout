string = ""
book = "f"
ary = ARGV.map{|s| s.to_i}

####### RUNNER #######

ary[0].times do |n|
	n.times {|i| string << book}
end