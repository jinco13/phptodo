FROM php:7.1-apache

RUN  a2enmod rewrite

# copy httpd.conf
COPY docker/php/000-default.conf /etc/apache2/sites-enabled/

# install libraries
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql mbstring

# open 5432 to connect to postgres
EXPOSE 5432

# copy entrypoint
COPY docker/php/start_apache.sh /entrypoint.sh
RUN chmod 755 /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

# docker run -d -p 80:80 --net devnw -v /path/to/app:/var/www/html:ro --name phpserver phpserver:latest bash
