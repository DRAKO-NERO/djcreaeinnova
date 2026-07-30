FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Configuración del sitio y reescritura para Nginx / Laravel
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV LARA_UNSPLASH 1

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Crear enlace simbólico de storage (para ver las imágenes)
RUN php artisan storage:link --force

# Permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpiar cachés de rutas y configuración
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80