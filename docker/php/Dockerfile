FROM php:7.4-fpm
WORKDIR /app
RUN apt-get update && apt-get install -y \
        curl \
        wget \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
	libpng-dev \
	libonig-dev \
	libzip-dev \
	libmcrypt-dev

RUN pecl install mcrypt-1.0.3 \
	&& docker-php-ext-enable mcrypt \
    && docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd \
        && docker-php-ext-install exif \
        && pecl install xdebug \
               && docker-php-ext-enable xdebug

RUN apt-get -y update \
&& apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini
EXPOSE 9000
CMD ["php-fpm"]
