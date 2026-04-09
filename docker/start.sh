#!/bin/sh
set -e

# Cachear configuración de Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Correr migraciones
php artisan migrate --force

# Iniciar php-fpm en background
php-fpm -D

# Iniciar nginx en foreground
exec nginx -g 'daemon off;'
