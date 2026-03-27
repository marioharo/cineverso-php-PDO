# Usamos la imagen base que definiste en tu compose
FROM php:8.2-apache

# Instalamos las extensiones de MySQL (mysqli y pdo_mysql)
# Estas son necesarias para que tu código PHP en /src pueda hablar con el contenedor mysql-8
RUN docker-php-ext-install mysqli pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

# Muy útil si luego usas frameworks o rutas personalizadas
RUN a2enmod rewrite

# Ajustamos los permisos para evitar problemas de escritura en macOS
RUN chown -R www-data:www-data /var/www/html
