FROM dockerfiles/centos-lamp 
COPY index.php /var/www/html/index.php
COPY news.php /var/www/html/news.php
COPY cat.jpg /var/www/html/cat.jpg
COPY news.sql /news.sql
COPY fl4g.sql /fl4g.sql
COPY mysql.sql /mysql.sql
COPY prepare.sh /prepare.sh
RUN sh prepare.sh
RUN sed -i "s/Indexes//g" /etc/httpd/conf/httpd.conf
