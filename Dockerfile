# Use the official PHP image from the Docker Hub
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents to the container working directory
COPY . .

# Copy .env.example to .env
COPY .env.example .env

# Generate application key
RUN php artisan key:generate

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Run Laravel migrations and seeders
RUN php artisan migrate --seed --force

# Clear cache
RUN php artisan optimize

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
