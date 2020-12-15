FROM php:7.4-fpm

#Install libs
RUN apt-get update && apt-get install -y \
        libpq-dev \
        wget \
        unzip \
        alien \
        libaio1 \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxml2-dev \
        libldap2-dev \
        libldb-dev \
        zip

RUN  docker-php-ext-install -j$(nproc) pdo soap pgsql pdo_pgsql \
    && docker-php-ext-enable  soap

#Install lib GD
RUN docker-php-ext-install gd

##Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

WORKDIR /var/www/html

COPY . /var/www/html
COPY ./docker/php/docker-entrypoint.sh /usr/local/bin/
ENTRYPOINT ["docker-entrypoint.sh"]

RUN chmod 777 /usr/local/bin/docker-entrypoint.sh

RUN chmod 777 -R storage/
