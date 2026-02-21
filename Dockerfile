# Usamos una imagen oficial de PHP con Apache
FROM php:8.0-apache

# Habilitamos el módulo rewrite de Apache (buena práctica)
RUN a2enmod rewrite

# Copiamos nuestra aplicación (la carpeta public-html) a la ruta pública de Apache
COPY public-html/ /var/www/html/

# [VULNERABILIDAD SIMULADA] 
# Creamos la carpeta uploads y le damos permisos 777 (lectura, escritura y ejecución para todos).
# Esto permitirá que el servidor guarde el archivo malicioso que subas.
RUN mkdir -p /var/www/html/uploads && chmod 777 /var/www/html/uploads

# Exponemos el puerto estándar HTTP del contenedor
EXPOSE 8000
