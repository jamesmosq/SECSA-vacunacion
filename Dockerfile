FROM php:8.3-fpm-alpine

# Dependencias del sistema
RUN apk add --no-cache \
    nginx \
    postgresql-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    unzip \
    curl

# Extensiones PHP
RUN docker-php-ext-install \
    pdo_pgsql \
    pgsql \
    gd \
    zip \
    bcmath \
    opcache

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar dependencias primero (aprovecha cache de Docker)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copiar toda la aplicación
COPY . .

# Regenerar autoloader con el código de la app
RUN composer dump-autoload --optimize --no-scripts

# Permisos de storage
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Configuración nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Script de arranque
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8080

CMD ["/start.sh"]
