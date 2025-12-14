# Etapa 1: Composer
FROM composer:2.7 AS composer
WORKDIR /app
COPY . /app
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Etapa 2: Vite build
FROM node:18 AS build
WORKDIR /app
COPY . /app
COPY --from=composer /app/vendor /app/vendor
RUN npm install && npm run build

# Etapa final
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_pgsql pgsql gd zip bcmath mbstring exif pcntl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY . /var/www/html

COPY --from=composer /app/vendor /var/www/html/vendor
COPY --from=build /app/public/build /var/www/html/public/build

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

ENV PORT=8000
EXPOSE $PORT

CMD php artisan migrate --force || true && \
    php artisan storage:link || true && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan scout:import "App\Models\Country" || true && \
    php artisan serve --host=0.0.0.0 --port=$PORT