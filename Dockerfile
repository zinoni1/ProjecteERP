FROM docker.io/bitnami/laravel:10

ARG NODE_VERSION=22.1.0

# Instalar una versión específica de Node.js, reemplace 'xx' con la versión que necesitas
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/master/install.sh | bash && source ~/.bashrc && nvm install ${NODE_VERSION} && nvm use ${NODE_VERSION}


