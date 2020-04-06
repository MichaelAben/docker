FROM php:7.2.23-apache
MAINTAINER Michael Aben <m.aben@live.nl>

RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y

# Download Node.JS
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash

# Other PHP7 Extensions
RUN rm /etc/apt/preferences.d/no-debian-php
RUN apt-get -y -qq install --fix-missing \
                libsqlite3-dev \
                libzip-dev \
                zip \
                libicu-dev \
                libonig-dev \
                libxml2-dev \
                php-soap \
                libfreetype6-dev \
                libjpeg62-turbo-dev \
                libpng-dev \
                apt-utils \
                nano \
                wget \
                dialog \
                iputils-ping \
                apt-utils \
                build-essential \
                git \
                curl \
                libcurl4 \
                nodejs \
                cron \
		        supervisor \
		        libmagickwand-dev

RUN pecl install imagick

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo_sqlite && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install tokenizer && \
    docker-php-ext-install json && \
    docker-php-ext-install zip && \
    docker-php-ext-install -j$(nproc) intl && \
    docker-php-ext-install soap && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install gd && \
    docker-php-ext-enable imagick

RUN apt-get update && apt-get install -y libc-client-dev libkrb5-dev && rm -r /var/lib/apt/lists/*
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN pecl install xdebug-2.8.1 && docker-php-ext-enable xdebug

# Configure Xdebug to interact with PHPstorm
ENV XDEBUGINI_PATH=/usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
ENV XDEBUG_CONFIG="remote_host=host.docker.internal"
ENV PHP_IDE_CONFIG="serverName=docker"

# Mailhog
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail

#Set apache document root
ENV APACHE_DOCUMENT_ROOT=/project
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Run crontab
RUN service cron start

# Enable apache modules
RUN a2enmod rewrite headers
RUN a2enmod ssl
RUN service apache2 restart
RUN a2enmod expires
