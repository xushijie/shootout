# $Id: ary-ruby.code,v 1.4 2004/11/13 07:41:27 bfulgham Exp $
# http://www.bagley.org/~doug/shootout/
# with help from Paul Brannan and Mark Hubbart

ary = ARGV.map{|s| s.to_i}

num = 100

ary[0].times do
  x = Array.new(num)
  y = Array.new(num, 0)

  num.times do |bi|
    x[bi] = bi + 1
  end

  (0 .. 999).each do |e|
    (num-1).step(0,-1) do |bi|
      y[bi] += x.at(bi)
    end
  end

  puts "#{y.first} #{y.last}"
end