FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip postgresql-client libcurl4-openssl-dev pkg-config libssl-dev libpq-dev

RUN docker-php-ext-install opcache pdo pdo_pgsql pgsql

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer && \
    composer self-update --stable

# NodeJS
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs