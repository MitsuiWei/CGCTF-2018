from http.server import HTTPServer, CGIHTTPRequestHandler
from socketserver import ThreadingMixIn

import sys

class ThreadingSimpleServer(ThreadingMixIn, HTTPServer):
    pass


address = sys.argv[1], int(sys.argv[2])
server = ThreadingSimpleServer(address, CGIHTTPRequestHandler)

print('Serving HTTP on %s port %d ...' % server.server_address)

try:
    while True:
        sys.stdout.flush()
        server.handle_request()
except KeyboardInterrupt:
    print('Exit')

