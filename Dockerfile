FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
        --install-dir=/usr/local/bin --filename=composer && chmod +x /usr/local/bin/composer 

WORKDIR /app

COPY . .

RUN chmod -R 777 storage && chmod -R 777 bootstrap/cache

RUN composer install

CMD php artisan serve --host=0.0.0.0