# Use PHP 8.2 FPM image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl nodejs npm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies & build frontend
RUN npm install
RUN npm run build

# Generate app key
RUN php artisan key:generate

# Run migrations
RUN php artisan migrate --force

# Expose port
EXPOSE 10000

# Start Laravel server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
