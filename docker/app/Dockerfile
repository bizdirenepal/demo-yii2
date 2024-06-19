FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -yq --no-install-recommends \
    apt-utils \
    curl \
    # Install git
    git \
    # Install apache
    apache2 \
    # Install php 8.1
    libapache2-mod-php \
    php-cli \
    php-json \
    php-curl \
    php-fpm \
    php-gd \
    php-ldap \
    php-mbstring \
    php-mysql \
    php-soap \
    php-sqlite3 \
    php-xml \
    php-zip \
    php-intl \
    # Install tools
    openssl \
    nano \
    graphicsmagick \
    imagemagick \
    ghostscript \
    mysql-client \
    iputils-ping \
    ca-certificates \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Update virtual host
COPY conf/000-default.conf /etc/apache2/sites-available/000-default.conf

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite expires
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf
RUN a2enconf servername

EXPOSE 80

WORKDIR /var/www

CMD apachectl -D FOREGROUND