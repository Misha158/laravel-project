FROM php:8.2-cli

# Установим зависимости
RUN apt-get update && apt-get install -y \
    zip unzip curl libpng-dev libonig-dev libxml2-dev \
    libzip-dev libpq-dev libjpeg-dev libfreetype6-dev \
    libmcrypt-dev libreadline-dev libssl-dev \
    libcurl4-openssl-dev pkg-config git mariadb-client

# Установим PHP-расширения
RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

CMD php artisan serve --host=0.0.0.0 --port=8000
