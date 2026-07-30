FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

RUN composer install --no-dev --optimize-autoloader --no-scripts

# Crear directorios necesarios
RUN mkdir -p /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs \
    /var/www/html/public/storage/portadas_uploads \
    /var/www/html/public/storage/portadas_uploadsimg

# Forzar la recreación del enlace simbólico
RUN rm -rf /var/www/html/public/storage
RUN php artisan storage:link --force

# Copiar el contenido de ambas carpetas para garantizar que las imágenes existan en ambos lados
RUN cp -rn /var/www/html/storage/app/public/* /var/www/html/public/storage/ || true
RUN cp -rn /var/www/html/storage/app/public/portadas_uploadsimg/* /var/www/html/public/storage/portadas_uploads/ || true
RUN cp -rn /var/www/html/storage/app/public/portadas_uploads/* /var/www/html/public/storage/portadas_uploadsimg/ || true

# Asignar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/public
RUN chmod -R 777 /var/www/html/storage /var/www/html/public

RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

# Exponer el puerto 80 explícitamente
EXPOSE 80

# Iniciar los servicios
CMD ["/start.sh"]