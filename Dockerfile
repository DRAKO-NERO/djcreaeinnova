FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Copiar la configuración personalizada de Nginx para manejar rutas de Laravel
COPY conf/nginx/site.conf /etc/nginx/sites-available/default.conf

# Variables de entorno para Nginx/PHP
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Crear el enlace simbólico para imágenes
RUN php artisan storage:link --force

# Asignar permisos adecuados
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Limpieza de cachés de Laravel
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80