#!/bin/sh
set -e

# Ensure directories exist and set proper ownership so Laravel can write cache and views
mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true

exec "$@"
