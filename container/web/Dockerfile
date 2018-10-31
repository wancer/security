FROM php:fpm-alpine

RUN apk --no-cache add nginx curl

RUN rm /etc/nginx/conf.d/default.conf
COPY ./conf.d /etc/nginx/conf.d/
RUN mkdir -p /run/nginx

RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

EXPOSE 80
WORKDIR /var/www

CMD composer install && sh -c nginx && php-fpm
