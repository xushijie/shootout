# Monte Carlo Pi
# Submitted by Seo Sanghyeon

ary = ARGV.map{|s| s.to_i}
sample = ary[0] 
count = 0

sample.times do
    x = rand
    y = rand
    if x * x + y * y < 1
      count += 1
    end
end

pi = 4.0 * count / sample
puts pi