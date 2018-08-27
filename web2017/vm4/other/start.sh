#!/bin/bash
service mysql start
mysql='mysql -u example_user --password=Admin2015 exampleDB'
for db in `ls /db`; do $mysql < /db/$db; done
rm -r /db
apachectl -k start -e info -DFOREGROUND
