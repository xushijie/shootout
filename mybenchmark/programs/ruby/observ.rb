# exercise the 'observer' pattern
# from ruby_trunk/sample/observ.rb

#! /usr/local/bin/ruby

require "thread"
require "observer"

class Tick
  include Observable
  def initialize
    $thread = Thread.start do
      $times.times do
	now = Time.now
	changed
	notify_observers(now.hour, now.min, now.sec)
      end
    end
  end
end

class Clock
  def initialize(tick)
    @tick = tick
    @tick.add_observer(self)
  end
  def update(h, m, s)
    #printf "\e[8D%02d:%02d:%02d", h, m, s
    #STDOUT.flush
  end
end

####### RUNNER #######

ary = ARGV.map{|s| s.to_i}
tnum = 100000

$times = tnum

ary[0].times do
  clock = Clock.new(Tick.new)
  $thread.join # no race condition
end
