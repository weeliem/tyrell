FROM php:7.4-fpm-alpine

WORKDIR /var/www

RUN apk update && apk add \
    build-base \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libzip-dev \
    oniguruma-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    nodejs \
    npm

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install sockets

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

# Copy config
COPY ./config/php/local.ini /usr/local/etc/php/conf.d/local.ini
#COPY ./config/nginx/run.sh /tmp/run.sh

COPY . .

EXPOSE 9001

RUN composer install
#ENTRYPOINT ["/tmp/run.sh"]