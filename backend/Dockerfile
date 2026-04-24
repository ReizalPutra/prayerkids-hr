FROM php:8.3-cli-alpine

WORKDIR /var/www/html

RUN apk add --no-cache \
    bash \
    curl \
    git \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    unzip \
    zip \
    && docker-php-ext-install pdo_mysql mbstring intl zip bcmath pcntl

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY docker/start-laravel.sh /usr/local/bin/start-laravel.sh
RUN chmod +x /usr/local/bin/start-laravel.sh

COPY . /var/www/html

EXPOSE 8000

CMD ["start-laravel.sh"]
