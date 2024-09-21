# Usa la última versión de PHP con Apache como imagen base
FROM php:apache

# Actualiza los paquetes y instala las extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Habilita el módulo mod_rewrite y mod_vhost_alias
RUN a2enmod rewrite vhost_alias

# Configura el archivo del Virtual Host con soporte para expresiones regulares
COPY ./vhost.conf /etc/apache2/sites-available/000-default.conf

# Habilita mod_rewrite (si aún no está habilitado)
RUN a2enmod rewrite

# Copia el contenido de tu aplicación a la carpeta del servidor web
COPY . /var/www/html/

# Da permisos a la carpeta de la aplicación
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expon el puerto 80 para el servidor Apache
EXPOSE 80

# Ejecuta Apache en modo foreground
CMD ["apache2-foreground"]