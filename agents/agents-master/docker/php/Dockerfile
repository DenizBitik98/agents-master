FROM php:8.1-fpm-alpine as app

ARG PROJECT_PATH=/var/www/html/

RUN apk add --no-cache \
    icu-dev \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-enable intl \
    && rm -rf /tmp/*

RUN apk add --update \
		$PHPIZE_DEPS \
		freetype-dev \
		sudo \
		htop \
		curl \
		nodejs \
		npm \
		git \
		libjpeg-turbo-dev \
		libpng-dev \
		libxml2-dev \
		libzip-dev \
		openssh-client \
		sqlite \
        postgresql-client \
	&& docker-php-ext-install soap sockets exif bcmath pdo_mysql mysqli pcntl \
	&& docker-php-ext-configure gd --with-jpeg --with-freetype \
	&& docker-php-ext-install gd \
	&& docker-php-ext-install zip

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN set -eux; \
    install-php-extensions pdo pdo_pgsql gd zip

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

COPY . ${PROJECT_PATH}

WORKDIR /var/www/html/

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN composer dump-autoload --optimize
