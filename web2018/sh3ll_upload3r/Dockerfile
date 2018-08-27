FROM dockerfiles/centos-lamp
COPY index.php /var/www/html/index.php
COPY sh /var/www/html/sh
COPY flag /flag
RUN mkdir /var/www/html/upload/
RUN chmod 733 /var/www/html/upload/
