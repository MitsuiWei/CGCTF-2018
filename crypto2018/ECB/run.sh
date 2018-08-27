socat tcp-listen:$PORT,reuseaddr,fork exec:'python3 ECB.py',echo=0,pty,stderr
