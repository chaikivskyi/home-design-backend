FROM php:8.4-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    libpq-dev \
    postgresql-dev \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    su-exec

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring intl zip

# Install Composer
RUN curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Set working directory
WORKDIR /var/www/html

# Configure PHP-FPM
RUN echo "catch_workers_output = no" >> /usr/local/etc/php-fpm.conf
RUN echo "php_admin_flag[log_errors] = On" >> /usr/local/etc/php-fpm.conf
RUN echo "php_admin_value[error_log] = /dev/stderr" >> /usr/local/etc/php-fpm.conf

RUN rm -rf /var/cache/apk/*

CMD ["php-fpm"]
