# Step 1: Get the official Composer binary
FROM composer:2 AS composer

# Step 2: Build the main PHP application
FROM php:8.4-apache

# Copy Composer from the first step directly into our app environment
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install PostgreSQL client extensions required by Yii2 and unzip for Composer
RUN apt-get update && apt-get install -y libpq-dev unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Enable Apache mod_rewrite for Yii2 pretty URLs
RUN a2enmod rewrite

# Change the Apache Document Root using modern key=value syntax
ENV APACHE_DOCUMENT_ROOT=/var/www/html/web
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Copy project files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Run composer to install dependencies safely
RUN composer install --no-dev --optimize-autoloader

# Force create the missing directories so chown doesn't fail
RUN mkdir -p /var/www/html/runtime /var/www/html/web/assets

# Set permissions for Yii2 runtime and assets folders
RUN chown -R www-data:www-data /var/www/html/runtime /var/www/html/web/assets

EXPOSE 80
