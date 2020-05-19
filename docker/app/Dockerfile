FROM php:7.3-fpm-alpine

# Install packages
RUN apk --update --no-cache add wget \
    curl \
    git \
    grep \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    imagemagick-dev \
    pcre-dev \
    libtool \
    make \
    autoconf \
    g++ \
    cyrus-sasl-dev \
    libgsasl-dev \
    supervisor \
    nano \
    libpng-dev \
    libzip-dev \
    nodejs \
    npm

RUN addgroup -g 1000 -S www-data; exit 0
RUN adduser -u 1000 -D -S -G www-data www-data; exit 0

# Install xdebug
RUN pecl install -f xdebug && \
    docker-php-ext-enable xdebug

# set our environment variable
ENV MUSL_LOCPATH="/usr/share/i18n/locales/musl"

# install libintl
# then install dev dependencies for musl-locales
# clone the sources
# build and install musl-locales
# remove sources and compile artifacts
# lastly remove dev dependencies again
RUN apk --no-cache add libintl && \
    apk --no-cache --virtual .locale_build add cmake make musl-dev gcc gettext-dev git && \
    git clone https://gitlab.com/rilian-la-te/musl-locales && \
    cd musl-locales && cmake -DLOCALE_PROFILE=OFF -DCMAKE_INSTALL_PREFIX:PATH=/usr . && make && make install && \
    cd .. && rm -r musl-locales && \
    apk del .locale_build

# Install php modules
RUN docker-php-ext-install mbstring pdo pdo_mysql tokenizer xml opcache gd zip soap exif \
 && pecl channel-update pecl.php.net \
 && yes '' | pecl install -f memcached \
 && yes '' | pecl install imagick \
 && yes '' | pecl install mcrypt-1.0.2 \
 && yes '' | pecl install redis \
 && docker-php-ext-enable memcached \
 && docker-php-ext-enable imagick \
 && docker-php-ext-enable mcrypt \
 && docker-php-ext-enable redis

# Install composer (for now)
COPY ./docker/app/composer-installer.sh /usr/local/bin/composer-install
RUN chmod +x /usr/local/bin/composer-install
RUN composer-install
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN composer --version

# Cleanup
RUN rm -R /var/cache/apk \
 && apk del --purge autoconf g++ make

# Copy configuration
COPY ./docker/app/supervisord.conf /etc/supervisord.conf
COPY ./docker/app/php.ini /usr/local/etc/php/php.ini

# Copy files to working directory
RUN mkdir -p /var/www/html && chown -R www-data:www-data /var/www/html

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisord.conf"]
