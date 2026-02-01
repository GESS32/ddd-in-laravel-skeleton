FROM php:8.4-fpm-alpine

ARG USER_ID=1000
ARG GROUP_ID=1000

RUN set -eux; \
    apk add --no-cache \
        icu-libs \
        libzip; \
    apk add --no-cache --virtual .build-deps \
        icu-dev \
        oniguruma-dev \
        libzip-dev; \
    apk add --no-cache \
        git \
        curl \
        zip \
        unzip; \
    docker-php-ext-install \
        bcmath \
        intl \
        mbstring \
        pdo \
        pdo_mysql \
        zip \
        opcache; \
    apk del .build-deps

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN set -eux; \
    addgroup -g "${GROUP_ID}" -S app; \
    adduser  -u "${USER_ID}" -S -D -G app app; \
    mkdir -p /app

WORKDIR /app
USER app
