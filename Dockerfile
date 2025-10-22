# IMAGE
FROM php:8.3-fpm-alpine

# directory
WORKDIR /var/www

# packages
RUN apk add --no-cache \
    build-base \
    # Gerekli kütüphaneler
    git \
    curl \
    zip \
    unzip \
    nodejs \
    npm \
    # PHP eklentileri için development paketleri
    postgresql-dev \
    oniguruma-dev \
    zlib-dev \
    libexif-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libwebp-dev

# extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp

# php extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# chmod
RUN chown -R www-data:www-data /var/www

# change user
USER www-data

# port
EXPOSE 9000

# run
CMD ["php-fpm"]
