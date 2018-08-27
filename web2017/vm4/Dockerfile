FROM linode/lamp
RUN apt-get update; apt-get install php5-mysql -y
ADD html /var/www/html
ADD other/db /db
ADD other/start.sh /start.sh
ADD apache /etc/apache2/sites-enabled
CMD ["bash", "/start.sh"]
# RUN a2enmod ssl