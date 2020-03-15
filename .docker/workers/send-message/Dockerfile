FROM composer:latest AS composer

FROM php:7.4-cli

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
        git \
        zip \
        unzip

RUN docker-php-ext-install -j$(nproc) exif bcmath sockets

COPY .docker/php-fpm/dev/laravel.ini /usr/local/etc/php/conf.d

WORKDIR /var/www

COPY composer.lock .
COPY composer.json .
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --prefer-dist --no-autoloader --no-scripts --ignore-platform-reqs

COPY . .

RUN composer dump-autoload

RUN chown -R www-data: ./storage

CMD php artisan worker:send-messages
