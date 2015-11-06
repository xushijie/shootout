def count_high how_many
  how_many.times {}
end

ary = ARGV.map{|s| s.to_i}
num_threads = 16

num_threads.times do
	threads = []
	num_threads.times{threads << Thread.new {count_high(ary[0]) }}
	threads.each{|t| t.join}
end