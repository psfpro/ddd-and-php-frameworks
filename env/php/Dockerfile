FROM composer:2.2.7 as composer
FROM php:8.1-fpm-alpine

COPY --from=mlocati/php-extension-installer:latest /usr/bin/install-php-extensions /usr/bin/install-php-extensions

ENV APP_DIR=/var/www

RUN apk add --update --no-cache \
      git \
      wget \
      unzip \
      npm \
      graphviz \
    && install-php-extensions \
      amqp \
      bcmath \
      gd \
      intl \
      pcntl \
      pdo_pgsql \
      soap \
      sockets \
      xdebug-3.1.5 \
      xmlreader \
      zip

WORKDIR /var/www

COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD composer install --optimize-autoloader --no-interaction --no-progress ; php-fpm

COPY etc/php.ini ${PHP_INI_DIR}/php.ini

EXPOSE 9000
