#!/bin/bash
set -e

echo "[ ****************** ] Starting Endpoint of Application [ ****************** ]"

if [ "$UPDATE_COMPOSER_DEPENDENCIES" == "true" ]; then
	echo "[ ****************** ] composer dependencies."
    composer install --ignore-platform-reqs --no-interaction --verbose --no-suggest --no-dev
fi

echo "Back - Starting Endpoint of Application"

if  ! [ -e "/var/www/html/.env" ] ; then
     echo "[ ****************** ] Copying sample application configuration to real one [ ****************** ]"
     cp /var/www/html/.env.example /var/www/html/.env \
     && chmod 777 /var/www/html/.env \
     && chmod 777 -R storage \
     && php artisan key:generate

     # Regex to many "/"
    sed -i "s@HOME_URI_VAL@$HOME_URI_VAL@g" /var/www/html/.env

    sed -i "s/@@DB_CONNECTION@@/$DB_CONNECTION/g" /var/www/html/.env
    sed -i "s/@@DB_HOST@@/$DB_HOST/g" /var/www/html/.env
    sed -i "s/@@DB_PORT@@/$DB_PORT/g" /var/www/html/.env
    sed -i "s/@@DB_DATABASE@@/$DB_DATABASE/g" /var/www/html/.env
    sed -i "s/@@DB_USERNAME@@/$DB_USERNAME/g" /var/www/html/.env
    sed -i "s/@@DB_PASSWORD@@/$DB_PASSWORD/g" /var/www/html/.env
fi

echo "[ ****************** ] Ending Endpoint of Application [ ****************** ]"

if [ "$USE_PHP_FPM" == "true" ]; then
    set -- php-fpm
fi

exec "$@"
