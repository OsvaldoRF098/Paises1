# Etapa 1: Builder
FROM composer:2.7 as composer
COPY . /app
WORKDIR /app
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

FROM node:18 as node
COPY . /app
COPY --from=composer /app/vendor /app/vendor
WORKDIR /app
RUN npm install && npm run build

# Etapa final: Imagen de producción
FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_pgsql pgsql gd zip bcmath

# Copiar código y dependencias
COPY . /var/www/html
COPY --from=composer /app/vendor /var/www/html/vendor
COPY --from=node /app/public/build /var/www/html/public/build

# Permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

WORKDIR /var/www/html

# Exponer puerto (Railway usa $PORT)
EXPOSE $PORT

# Comando de inicio
CMD php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan storage:link && \
    php artisan scout:import "App\Models\Country" && \
    php artisan serve --host=0.0.0.0 --port=$PORT