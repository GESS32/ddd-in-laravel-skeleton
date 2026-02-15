FROM php:8.4-fpm-alpine3.23

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN set -eux; \
    apk add --no-cache \
        icu-libs \
        libzip \
        oniguruma; \
    \
    apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        icu-dev \
        libzip-dev \
        oniguruma-dev; \
    \
    apk add --no-cache git curl zip unzip; \
    \
    docker-php-ext-install \
        bcmath \
        intl \
        mbstring \
        pdo \
        pdo_mysql \
        zip \
        opcache; \
    \
    apk del .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN set -eux; \
    addgroup -g "${GROUP_ID}" -S app; \
    adduser  -u "${USER_ID}" -S -D -G app app; \
    mkdir -p /app

WORKDIR /app
USER app
