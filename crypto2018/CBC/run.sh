socat tcp-listen:$PORT,reuseaddr,fork exec:'python3 CBC.py',echo=0,pty,stderr
