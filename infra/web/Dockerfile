FROM php:8.0-apache

COPY my-php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    libzip-dev \
    vim \
    unzip \
    zip \
    git

RUN docker-php-ext-install zip pdo_mysql

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

COPY 000-default.conf /etc/apache2/sites-enabled/
RUN a2enmod rewrite

WORKDIR /var/www/html