FROM php:7.2.9

# php extension
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libgmp-dev \
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
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

RUN pecl install redis \
    && pecl install swoole \
    && docker-php-ext-enable redis swoole

# php composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

CMD ['php', '-v']
