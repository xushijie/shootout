require 'socket'

ary = ARGV.map{|s| s.to_i}

server = TCPServer.new '127.0.0.1', 0
host, port = server.addr[3], server.addr[1]

ary[0].times do
   client = TCPSocket.new host, port
   server_conn = server.accept
   client.close
   server_conn.close
end
