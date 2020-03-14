FROM nginx:1.15-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache bash \
    && adduser -D -H -u 1000 -s /bin/bash www-data

ARG PHP_UPSTREAM_CONTAINER=app_la_realtime
ARG PHP_UPSTREAM_PORT=9000

# Set upstream conf and remove the default conf
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" \
       > /etc/nginx/conf.d/upstream-php.conf \
    && rm /etc/nginx/conf.d/default.conf

COPY .docker/nginx/nginx.conf /etc/nginx/
COPY .docker/nginx/sites/default.conf /etc/nginx/conf.d/default.conf
COPY ./public /var/www/public
COPY --from=node /usr/share/nginx/html/public /var/www/public

#CMD ["nginx"]

#EXPOSE 80 443
