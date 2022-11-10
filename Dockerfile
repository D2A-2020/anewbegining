FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN rm -rf /usr/local/apache2/httpd.conf
COPY /config/httpd.conf /usr/local/apache2/conf
COPY src/ /var/www/html/

EXPOSE 80

