import socket
import random
from thread import *
from threading import *
from secret import flag
import sys

ip = '0.0.0.0'
port = int(sys.argv[1])

p = 104289738528669059208364755334844034384221751041191583274615128714091715005092541702227271623379503907511308956195772313791763524822875817801219214664426072460597414699803333050946288880113942603477312728618613453908818259444247195600345874689813719565615336996019891979751157320249341518259279131698239428019
g = 781711373497495557708052952446921676390989528088850889348193734704535514807443


class Process(Thread):

    def __init__(self,conn) :
        Thread.__init__(self)
        self.conn = conn
    
    def run(self):

    # ************************************************************************
    # **************   Only Here is important  *******************************
    # ************************************************************************
    
        self.conn.send('Public key:\n')
        self.conn.send('p = %d\n' % p)
        self.conn.send('g = %d\n' % g)
        self.conn.send('-' * 60 + '\n')
        try :
            ga = 0
            key = 0
            b    = random.SystemRandom().getrandbits(1024)
            bb = pow(g,b,p)
            self.conn.send('Server Send B: \n%d\n\n' % bb)    # give you g^B
            for i in range(1,3):
                self.conn.send('Round %d\n' % i )
                self.conn.send('Please give me your A.\n')
                aa = int(self.conn.recv(8192))    # give me ga
                assert aa >= 2 and ga != aa, "Don't Cheat!!!!!!"
                ga = aa
                k = pow(aa,b,p)            # Key = gAB
                key ^= k 
                self.conn.send('Key %d Encrypted.\n\n' % i )

            self.conn.send('( Encrypt: flag ^ key1 ^ key2 ) : ' + str(flag^key) + '\n') 
            self.conn.close()


    # ******************************************************************************
    # ******************************************************************************
    # ******************************************************************************


    
        except ValueError:
            self.report('Error Input.')
        except Exception,e:
            self.report(str(e))

    def report(self,msg):
        self.conn.send(msg)
        self.conn.close()


try :
    # Create a TCP/IP socket
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
    # Bind the socket to the port
    server_address = (ip,port)
    sock.bind(server_address)
    # Listen for incoming connections
    sock.listen(10)


    while True:
        # Wait for a connection
        conn, addr = sock.accept()
        print '[*] Connected with ' + addr[0] + ':' + str(addr[1])
        Process(conn).start()

    connection.close()
except Exception,e:
    print str(e)
    sock.close()
    pass



    # 
