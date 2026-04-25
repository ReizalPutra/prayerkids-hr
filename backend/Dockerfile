FROM php:8.4-cli-alpine

WORKDIR /var/www/html

RUN set -eux; \
    apk upgrade --no-cache; \
    apk add --no-cache \
        icu-libs \
        libzip \
        unzip; \
    apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        icu-dev \
        libzip-dev \
        oniguruma-dev; \
    docker-php-ext-install -j"$(nproc)" pdo_mysql mbstring intl zip bcmath pcntl; \
    apk del .build-deps

COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer
COPY docker/start-laravel.sh /usr/local/bin/start-laravel.sh
RUN chmod +x /usr/local/bin/start-laravel.sh

RUN addgroup -S app && adduser -S -G app app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

COPY . /var/www/html

RUN composer dump-autoload --optimize --no-dev --no-interaction

RUN chown -R app:app /var/www/html

USER app

EXPOSE 8000

CMD ["start-laravel.sh"]
