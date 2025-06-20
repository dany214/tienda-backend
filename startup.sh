#!/bin/bash
cd /home/site/wwwroot

php artisan config:cache
php artisan route:cache

# Lanza Laravel apuntando a la carpeta public
php -S 0.0.0.0:8080 -t public
