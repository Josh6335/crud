# Use the official PHP image with Apache
FROM php:8.2-apache

# Set working directory inside the container
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    curl \
    git \
    libonig-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Laravel project files
COPY . /var/www/html

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set correct permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache to serve Laravel from the public directory
# Copy custom Apache configuration
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Set the entrypoint command to start Apache
CMD ["apache2-foreground"]
