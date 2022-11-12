FROM php:7.1-apache



#RUN docker-php-ext-install pdo pdo_mysql

RUN echo "cd /usr/local/src" >> ~/.bashrc
 

RUN apt-get update
RUN apt install -y git && git config --global user.name "D2A-2020" && git config --global user.email "davidadriansantoslopez@gmail.com"


RUN cd /usr/local/src &&git init && git clone --branch main https://github.com/D2A-2020/anewbegining.git

ENV APACHE_DOCUMENT_ROOT /usr/local/src/anewbegining/src
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf




EXPOSE 80
