FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Configuración de Nginx para Laravel
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Crear directorios del storage y asegurar caché
RUN mkdir -p /var/www/html/storage/app/public/portadas_uploads \
    /var/www/html/storage/app/public/portadas_uploadsimg \
    /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs

# Forzar la recreación del enlace simbólico
RUN rm -rf /var/www/html/public/storage
RUN php artisan storage:link --force

# Asignar permisos adecuados
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Limpiar cachés
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80