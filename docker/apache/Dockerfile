FROM php:7.3-apache
MAINTAINER Michael Aben <m.aben@live.nl>

RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y

# Install useful tools
RUN apt-get -y install apt-utils nano wget dialog iputils-ping

# Install important libraries
RUN apt-get -y install --fix-missing apt-utils build-essential git curl libcurl4 zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN pecl install xdebug-2.7.2
RUN docker-php-ext-enable xdebug

# Configure Xdebug to interact with PHPstorm
ENV XDEBUGINI_PATH=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ENV XDEBUG_CONFIG="remote_host=host.docker.internal"
ENV PHP_IDE_CONFIG="serverName=docker"

# Other PHP7 Extensions

RUN apt-get -y install libsqlite3-dev libsqlite3-0
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_sqlite
RUN docker-php-ext-install mysqli

RUN docker-php-ext-install tokenizer
RUN docker-php-ext-install json

RUN apt-get -y install libzip-dev zip
RUN docker-php-ext-configure zip --with-libzip
RUN docker-php-ext-install zip

RUN apt-get -y install libicu-dev
RUN docker-php-ext-install -j$(nproc) intl

RUN docker-php-ext-install mbstring

RUN rm /etc/apt/preferences.d/no-debian-php
RUN apt-get -y install libxml2-dev
RUN apt-get -y install php-soap
RUN docker-php-ext-install soap

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd

# Mailhog
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail

# Enable apache modules
RUN a2enmod rewrite headers
RUN a2enmod ssl
RUN service apache2 restart
