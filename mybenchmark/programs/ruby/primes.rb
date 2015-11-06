# This tests the Prime class' generation speed.
# 
# Ruby 1.8 MRI has an extremely poor/naive implementation of Prime
# therefore it is expected to timeout on most machines for all but
# n = 3_000. The higher parameters are still useful to test Ruby 1.9
# and other implementations.
#
# Ruby 1.9 generates a warning about Prime::new being obsolete.
# It is used here to maintain compatibility with Ruby 1.8.

require 'mathn'

p = Prime.new

ary = ARGV.map{|s| s.to_i}

ary[0].times do
	p.succ
end