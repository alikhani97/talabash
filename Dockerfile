FROM php:8.3-fpm

RUN apt-get update \
    && apt-get install -y git zip unzip

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer dump-autoload --optimize

COPY ./src /var/www/html
WORKDIR /var/www/html
