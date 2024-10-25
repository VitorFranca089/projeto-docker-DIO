FROM php:8.1-apache

# Instala a extensão MySQLi
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copie o código PHP para o diretório que será servido pelo Apache
COPY ./src /var/www/html