# Use the official PHP 8.2 FPM image
FROM php:8.2-fpm

# Install system dependencies & Node.js
RUN apt-get update && apt-get install -y \
    nodejs \
    npm \
    unzip \
    curl \
    git

# Set Git safe directory to avoid "dubious ownership" error
RUN git config --global --add safe.directory /var/www/html

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project files to container
COPY . .

# Install PHP dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Install & build frontend assets
RUN npm install && npm run build

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 8000
EXPOSE 8000

# Start Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
