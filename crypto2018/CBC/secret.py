import binascii
from hashlib import md5
from base64 import b64decode
from base64 import b64encode
from Crypto import Random
from Crypto.Cipher import AES

secret_key = ':o:oooooooooo:o:'
flag = 'CGCTF{BiT_Flip!!!!OOOO}'

# Padding for the input string --not
# related to encryption itself.
BLOCK_SIZE = 16  # Bytes

pad = lambda s: s + (BLOCK_SIZE - len(s) % BLOCK_SIZE) * \
                chr(BLOCK_SIZE - len(s) % BLOCK_SIZE)
unpad = lambda s: s[:-ord(s[len(s) - 1:])]

class AES_CBC_Cipher:
    """
    Usage:
        c = AESCipher('password').encrypt('message')
        m = AESCipher('password').decrypt(c)
    Tested under Python 3 and PyCrypto 2.6.1.
    """

    def __init__(self, key):
        self.key = md5(key.encode('utf8')).hexdigest()

    def encrypt(self, raw):
        raw = pad(raw)
        iv = Random.new().read(AES.block_size)
        cipher = AES.new(self.key, AES.MODE_CBC, iv)
        return ''.join([hex(int(c))[2:].rjust(2,'0') for c in iv + cipher.encrypt(raw)])

    def decrypt(self, enc):        
        enc = bytes(map(lambda x: int(x,16),[enc[i*2:i*2+2] for i in range(len(enc)//2)]))
        iv = enc[:16]
        cipher = AES.new(self.key, AES.MODE_CBC, iv)
        return unpad(cipher.decrypt(enc[16:]))
