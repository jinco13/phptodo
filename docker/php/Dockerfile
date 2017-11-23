FROM php:7.1-apache

RUN  a2enmod rewrite

# copy httpd.conf
COPY docker/php/000-default.conf /etc/apache2/sites-enabled/

# install libraries
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql mbstring

RUN pecl install xdebug-2.5.5 && docker-php-ext-enable xdebug

RUN echo '[xdebug]' >> /usr/local/etc/php/php.ini
RUN echo 'zend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20160303/xdebug.so' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_port=9000' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_enable=1' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_host=docker.for.mac.localhost' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_handler=dbgp' >> /usr/local/etc/php/php.ini
RUN echo 'xdebug.remote_autostart=1' >> /usr/local/etc/php/php.ini

# open 5432 to connect to postgres
EXPOSE 5432

# open 9000 to connect to xdebug
EXPOSE 9000

# copy entrypoint
COPY docker/php/start_apache.sh /entrypoint.sh
RUN chmod 755 /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

# docker run -d -p 80:80 -p 9000:9000 --net devnw -v /path/to/app:/var/www/html:ro --name phpserver phpserver:latest bash
