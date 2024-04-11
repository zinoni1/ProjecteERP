FROM php:8.2-apache-bullseye

# Importamos los argumentos y en caso de no existir se asigna un valor por defecto
ARG EXTRA_PHP_LIBRARIES=null
ARG DEBIAN_FRONTEND=noninteractive

# Instalar dependencias
RUN apt update && apt install -y --no-install-recommends \
    curl \
    git \
    ca-certificates \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    zlib1g

# Instalar extensiones de PHP en caso de que se hayan pasado como argumento
RUN if [ "${EXTRA_PHP_LIBRARIES}" != "null" ]; then \
        docker-php-ext-install ${EXTRA_PHP_LIBRARIES}; \
    fi

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Instalar NVM y Node lastest version(default)
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/master/install.sh | bash && . ~/.bashrc && nvm install node

# Clean up
RUN apt clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /app
