FROM php:8.4-cli

MAINTAINER Flc <i@flc.io>

# php extension
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libgmp-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) bcmath \
        iconv \
        mysqli \
        gettext \
        pcntl \
        pdo_mysql \
        sysvsem \
        sockets \
        gmp \
        zip \
    && docker-php-ext-install -j$(nproc) gd

## install swoole
RUN pecl install swoole \
    && docker-php-ext-enable swoole

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

CMD ['php', '-v']
