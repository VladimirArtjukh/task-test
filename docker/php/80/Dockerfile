# Use the official PHP 8 image as the base image
FROM php:8.0-fpm

# Set the working directory inside the container
WORKDIR /var/www

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
        git \
        zip \
        unzip \
        libonig-dev \
        libxml2-dev \
        libzip-dev \
        libgd-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev
#Install Debuger
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/
RUN docker-php-ext-install pdo pdo_mysql gd intl
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

ADD config/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

EXPOSE 9000
CMD ["php-fpm"]