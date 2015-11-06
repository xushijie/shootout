ary = ARGV.map{|s| s.to_i}

a = []
ary[0].times { a << []} # use up some RAM
ary[0].times {[]}
