FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Configuración de Nginx para Laravel
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Instalar dependencias de composer
RUN composer install --no-dev --optimize-autoloader

# Crear enlace simbólico de imágenes
RUN php artisan storage:link --force

# Asignar permisos requeridos por Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80