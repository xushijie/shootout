def tarai( x, y, z )
  if (x <= y)
    y
  else
    tarai(tarai(x-1, y, z),
          tarai(y-1, z, x),
          tarai(z-1, x, y))
  end
end

ary = ARGV.map{|s| s.to_i}

ary[0].times do 
	tarai(13, 1, 0)
end
