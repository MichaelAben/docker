FROM php:8.1-apache
MAINTAINER Michael Aben <m.aben@live.nl>

# Update everything
RUN apt-get -y update --fix-missing
RUN apt-get upgrade -y

# Download Node.JS
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash

# Somehow this is neded, dont know why
RUN rm /etc/apt/preferences.d/no-debian-php

# Other PHP Extensions
RUN apt-get -y -qq install --fix-missing libsqlite3-dev
RUN apt-get -y -qq install --fix-missing libzip-dev
RUN apt-get -y -qq install --fix-missing zip
RUN apt-get -y -qq install --fix-missing libicu-dev
RUN apt-get -y -qq install --fix-missing libonig-dev
RUN apt-get -y -qq install --fix-missing libxml2-dev
RUN apt-get -y -qq install --fix-missing php-soap
RUN apt-get -y -qq install --fix-missing libfreetype6-dev
RUN apt-get -y -qq install --fix-missing libjpeg62-turbo-dev
RUN apt-get -y -qq install --fix-missing libpng-dev
RUN apt-get -y -qq install --fix-missing apt-utils
RUN apt-get -y -qq install --fix-missing nano
RUN apt-get -y -qq install --fix-missing wget
RUN apt-get -y -qq install --fix-missing dialog
RUN apt-get -y -qq install --fix-missing iputils-ping
RUN apt-get -y -qq install --fix-missing apt-utils
RUN apt-get -y -qq install --fix-missing build-essential
RUN apt-get -y -qq install --fix-missing git
RUN apt-get -y -qq install --fix-missing curl
RUN apt-get -y -qq install --fix-missing libcurl4
RUN apt-get -y -qq install --fix-missing nodejs
RUN apt-get -y -qq install --fix-missing cron
RUN apt-get -y -qq install --fix-missing libmagickwand-dev
RUN apt-get -y -qq install --fix-missing libc-client-dev
RUN apt-get -y -qq install --fix-missing libkrb5-dev

# Remove unneded files
RUN rm -r /var/lib/apt/lists/*

# Add Imageick
RUN mkdir -p /usr/src/php/ext/imagick;
RUN curl -fsSL https://github.com/Imagick/imagick/archive/refs/tags/3.7.0.tar.gz | tar xvz -C "/usr/src/php/ext/imagick" --strip 1;
RUN docker-php-ext-install imagick;

# Configure extentions
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl

# Install extention trough docker
RUN docker-php-ext-install imagick;
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pdo_sqlite
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install zip
RUN docker-php-ext-install -j$(nproc) intl
RUN docker-php-ext-install soap
RUN docker-php-ext-install gd
RUN docker-php-ext-install imap
RUN docker-php-ext-install exif

# Enable extentions trough docker
RUN docker-php-ext-enable imagick

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug

# Mailhog
RUN curl -Lsf 'https://storage.googleapis.com/golang/go1.8.3.linux-amd64.tar.gz' | tar -C '/usr/local' -xvzf -
ENV PATH /usr/local/go/bin:$PATH
RUN go get github.com/mailhog/mhsendmail
RUN cp /root/go/bin/mhsendmail /usr/bin/mhsendmail

# Set apache document root
ENV APACHE_DOCUMENT_ROOT=/project
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Locales
RUN apt-get update
RUN apt-get install -y locales locales-all
ENV LC_ALL nl_NL.utf8
ENV LANG nl_NL.utf8
ENV LANGUAGE nl_NL.utf8

# Run crontab
RUN service cron start

# Enable apache modules
RUN a2enmod rewrite headers
RUN a2enmod ssl
RUN a2enmod expires
