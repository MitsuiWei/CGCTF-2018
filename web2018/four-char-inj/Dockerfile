FROM dockerfiles/centos-lamp 
COPY index.php /var/www/html/index.php
COPY config.php /var/www/html/config.php
COPY news.sql /news.sql
RUN service mysqld start && cat /news.sql | mysql -uroot
RUN sed -i "s/Indexes//g" /etc/httpd/conf/httpd.conf
