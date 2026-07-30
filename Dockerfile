FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Configuración de Nginx para Laravel
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Asegurar directorios de Laravel
RUN mkdir -p /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/public/storage

# Copiar físicamente las imágenes a public/storage por si falla el Symlink
RUN cp -rn /var/www/html/storage/app/public/* /var/www/html/public/storage/ || true

# Crear también el enlace simbólico por respaldo
RUN php artisan storage:link --force

# Asignar permisos universales
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Limpiar cachés
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80