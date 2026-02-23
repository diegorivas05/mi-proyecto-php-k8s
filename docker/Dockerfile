# Etapa 1: usar la imagen oficial de composer para instalar dependencias
FROM composer:2 AS vendor
WORKDIR /app
COPY api-php/composer.json api-php/composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress
COPY api-php/ /app

# Etapa final: imagen de PHP con Apache
FROM php:8.2-apache
WORKDIR /var/www/html
COPY --from=vendor /app /var/www/html
RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite
ENV JWT_SECRET="gdxxl"
EXPOSE 80
CMD ["apache2-foreground"]