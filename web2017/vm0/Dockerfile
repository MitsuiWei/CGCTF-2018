FROM php:7-apache
ADD flag /flag
ADD html /var/www/html
ADD db /db
ADD sql /sql
ADD apache /etc/apache2/sites-available
RUN chmod a+rwx /var/www/html/shell/upload
RUN chmod a+rwx -R /var/www/html/message_board_demo
RUN apt update; apt install -y iputils-ping
# RUN a2enmod ssl
