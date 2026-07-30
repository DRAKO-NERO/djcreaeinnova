FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Indicar a la plantilla la ubicación exacta de la configuración de Nginx
ENV NGINX_SITES_CONFIG /var/www/html/conf/nginx/site.conf

# Variables de entorno requeridas
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Crear enlace simbólico de imágenes
RUN php artisan storage:link --force

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Limpiar cachés
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80