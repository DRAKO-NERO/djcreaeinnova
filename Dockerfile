FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

# Configuración del servidor web
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Dar permisos de escritura a las carpetas clave de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80