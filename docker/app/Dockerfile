# Use the official PHP 8.3 FPM image as a base
FROM php:8.3-fpm-alpine

# Set the working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    mysql-client

# Install required PHP extensions for Laravel & MySQL
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql zip gd exif

# Install Composer (globally)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set permissions for storage/cache
RUN mkdir -p /var/www/html/storage/framework/sessions \
             /var/www/html/storage/framework/views \
             /var/www/html/storage/framework/cache \
             /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Change to the non-root user
USER www-data

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Run PHP-FPM
CMD ["php-fpm"]