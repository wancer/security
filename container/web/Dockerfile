FROM php:fpm-alpine

RUN apk --no-cache add nginx curl

RUN rm /etc/nginx/conf.d/default.conf
COPY ./conf.d /etc/nginx/conf.d/
RUN mkdir -p /run/nginx

RUN curl --silent --show-error https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
# RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && chmod o+x /usr/local/bin/symfony

EXPOSE 80

CMD ["sh", "-c", "nginx && php-fpm"]
