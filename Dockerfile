FROM php:8.0-apache

EXPOSE 80
WORKDIR /app

# git, unzip & zip are for composer
RUN apt-get update -qq && \
    apt-get install -qy \
    git \
    gnupg \
    unzip \
    zip && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# PHP Extensions
RUN docker-php-ext-install -j$(nproc) opcache pdo_mysql
COPY docker/conf/php.ini /usr/local/etc/php/conf.d/app.ini

# Apache
COPY docker/errors /errors
COPY docker/conf/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/conf/apache.conf /etc/apache2/conf-available/z-app.conf

# Apache - App (src)
COPY app /app/app
COPY public /app/public
COPY index.html /app/index.html

RUN a2enmod rewrite remoteip && \
    a2enconf z-app
