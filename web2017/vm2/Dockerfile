FROM php:7-apache
ADD html /var/www/html
RUN chmod a+wx /var/www/html/wormhole/uploads
ADD another_universe /another_universe
ADD utils /utils
ADD apache /etc/apache2/sites-enabled
# RUN a2enmod ssl