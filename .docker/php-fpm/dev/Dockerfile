FROM composer:latest AS composer

FROM php:7.4-fpm

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libmcrypt-dev \
        git \
        zip \
        unzip

RUN docker-php-ext-install -j$(nproc) mbstring tokenizer mysqli pdo_mysql exif bcmath sockets

RUN pecl install mongodb && docker-php-ext-enable mongodb

COPY .docker/php-fpm/dev/laravel.ini /usr/local/etc/php/conf.d
COPY .docker/php-fpm/dev/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN usermod -u 1000 www-data
WORKDIR /var/www

ENV COMPOSER_ALLOW_SUPERUSER=1

EXPOSE 9000
