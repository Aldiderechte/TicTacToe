FROM nginx:alpine as nginx

CMD ["nginx", "-g", "daemon off;"]

FROM php:8.2-fpm-alpine3.18 AS php-base

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
        install-php-extensions gd xdebug

CMD ["php-fpm"]