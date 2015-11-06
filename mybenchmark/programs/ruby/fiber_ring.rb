
require 'fiber'
require 'benchmark'

class Ring
   attr_reader :id
   attr_accessor :attach 

   def initialize(id)
      @id = id
      @fiber = Fiber.new do
         pass_message
      end
   end

   def |(other)
      other.attach = self if !other.nil?
      other
   end

   def resume
      @fiber.resume
    end

   def pass_message
      while message = message_in
         message_out(message)      
      end
   end

   def message_in
      @attach.resume if !@attach.nil?
   end

   def message_out(message)
      Fiber.yield(message)
   end

end

class RingStart < Ring
   attr_accessor :message
   def initialize(n, m, message)
      @m = m
      @message = message
      super(n)
   end
   
   def pass_message 
      loop { message_out(@message) }
   end

end


def create_chain_r(i, chain)
   # recursive version
   return chain if i<=0
   r = chain.nil? ? Ring.new(i) :  chain | Ring.new(i)
   create_chain(i-1, r)
end

def create_chain(n, chain)
   # loop version
   # needed to avoid stack overflow for high n
   n.downto(0) {
      chain = chain | Ring.new(n)
   }
   chain
end

mess = :hello

#Disclaimer: I have no idea why the numbers in this one are laid out the way they are, but it works the same way as the original.
####### RUNNER #######

ary = ARGV.map{|s| s.to_i}
num1 = 10 #no idea

ary[0].times do
	m = num1
	ringu = RingStart.new(0,m,mess)
	chain = create_chain(num1, ringu)
	m.times {ringu.message = chain.resume }
end

#commandline: ruby bm_fiber_ring.rb arg1 [arg2]
#arg1 is the number of times the test should be performed, arg2 is optional (something about loop iterations internally within the test)
#original is 100 iterations with m=10, calibrated to take ~5sec on Java HotSpot Server at the time of writing 
#too many iterations causes memory errors pretty quickly