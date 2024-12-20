FROM php:8.4.2

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

RUN pecl install swoole \
    && pecl install mongodb \
    && docker-php-ext-enable swoole mongodb

# php composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

CMD ['php', '-v']
