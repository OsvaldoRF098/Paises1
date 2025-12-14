# Etapa 1: Instalar dependencias PHP con Composer (con git para downloads from source)
FROM php:8.2-cli AS composer
RUN apt-get update && apt-get install -y git unzip && rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . ./
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Etapa 2: Compilar assets con Node/Vite
FROM node:18 AS build
WORKDIR /app
COPY . ./
COPY --from=composer /app/vendor ./vendor
RUN npm install && npm run build

# Etapa final: Imagen de producción con PHP 8.2
FROM php:8.2-fpm

# Instalar dependencias del sistema y extensiones PHP
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

# Copiar código del proyecto
WORKDIR /var/www/html
COPY . .

# Copiar vendor de la etapa composer
COPY --from=composer /app/vendor ./vendor

# Copiar assets compilados (build de Vite)
COPY --from=build /app/public/build ./public/build

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Exponer puerto dinámico de Railway
ENV PORT=8000
EXPOSE $PORT

# Comando de inicio (robusto para producción)
CMD php artisan migrate --force || true && \
    php artisan storage:link || true && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan scout:import "App\Models\Country" || true && \
    php artisan serve --host=0.0.0.0 --port=$PORT