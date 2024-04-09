FROM ubuntu:latest

ARG DEBIAN_FRONTEND=noninteractive

ARG EXTRA_PHP_LIBRARIES

# Instalar dependencias
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    git \
    ca-certificates \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get clean

#Instalar PHP
RUN apt-get update && apt -y install software-properties-common && add-apt-repository ppa:ondrej/php

RUN apt-get update && apt-get install -y --no-install-recommends \
    php8.2\
    libapache2-mod-php \
    php8.2-cli \
    php-curl \
    php-xml \
    php-json \
    php-mysql \
    php-mbstring \
    ${EXTRA_PHP_LIBRARIES}

RUN apt clean

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Instalar NVM y Node lastest version(default)
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/master/install.sh | bash && . ~/.bashrc && nvm install node

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Configuración adicional, como la exposición de puertos y el comando por defecto
# EXPOSE 8000

# CMD ["node", "tu_script.js"]


WORKDIR /app
