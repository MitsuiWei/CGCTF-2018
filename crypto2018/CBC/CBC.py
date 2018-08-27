from secret import AES_CBC_Cipher
from secret import secret_key, flag
import json

Encrypter = AES_CBC_Cipher(secret_key)

while True :
    print('Choose a service')
    print('(1) Encrypt')
    print('(2) Decrypt')
    print('(3) Show Source')
    choice = int(input('Select: '))
    
    if choice == 1 :
        username = str(input('Register a username: '))
        if 'admin' in username:
            print('Your username cannot contain "admin"')
            print('-' * 60)
            continue
        plaintxt = 'username={}&is_admin=0'.format(username)
        print('Auth token: {}'.format(plaintxt))
        token = Encrypter.encrypt(plaintxt)
        print('IV + Cipher (AES-CBC Encryption, block_size=16): {}'.format(token))

    elif choice == 2:
        en_token = input('Give me your encrypted token: ')
        try :
            token = Encrypter.decrypt(en_token)
            print('Result: {}'.format(token))

            if b'is_admin=1' in token:
                print('Hey admin! Here is your flag: {}'.format(flag))
                break
            else:
                print('Access denied because is_admin is not 1')
        except:
            print('Decryption failed')
    
    elif choice == 3:
        print('-' * 60)
        print(open('CBC.py').read())

    else:
        break

    print('-' * 60)

