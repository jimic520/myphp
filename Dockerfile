FROM youshandefeiyang/php-env
WORKDIR /
RUN mkdir -p /var/www/html
ADD resource.php /var/www/html/
