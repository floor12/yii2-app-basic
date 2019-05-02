FROM php:7.1-fpm

RUN apt-get update
RUN apt-get install -y \
            git \
            zlib1g-dev
RUN apt-get install -y zip
RUN apt-get install -y wget

RUN wget https://storage.googleapis.com/downloads.webmproject.org/releases/webp/libwebp-0.4.1-linux-x86-32.tar.gz
RUN tar xzfv libwebp-0.4.1-linux-x86-32.tar.gz
RUN cp libwebp-0.4.1-linux-x86-32/bin/* /usr/local/bin/
RUN rm libwebp-0.4.1-linux-x86-32.tar.gz
RUN rm -rf libwebp-0.4.1-linux-x86-32

RUN docker-php-ext-install pdo pdo_mysql zip
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN cp composer.phar /usr/local/bin/composer

WORKDIR /app