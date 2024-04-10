#! /bin/bash

# This is the entrypoint for the development environment

set -e  # Exit immediately if a command exits with a non-zero status.

# Inicializar variables para argumentos
port_laravel=8000
node_version="node"

# Bucle para procesar argumentos
while getopts "p:n:" opt; do
  case $opt in
    p) port_laravel="$OPTARG" ;;
    n) node_version="$OPTARG" ;;
    \?) echo "Opción inválida: -$OPTARG" >&2 ;;
  esac
done

# Verifica si el archivo artisan existe en el directorio actual
if [ ! -f artisan ]; then
  echo "Archivo artisan no encontrado. Creando un nuevo proyecto Laravel..."

  # Crea un nuevo proyecto Laravel Automáticamente
  composer create-project laravel/laravel example-app

  # Mueve el contenido del directorio example-app al directorio actual #TODO: Revisar si funciona
  mv example-app/* ./
  # rm -rf example-app

  echo "Nuevo proyecto Laravel creado."
fi

# Install dependencies and start the server
composer install

# Instala NVM para que pueda ser usado por el usuario root
chmod +x ~/.nvm/nvm.sh
export NVM_DIR="/root/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"
[ -s "$NVM_DIR/bash_completion" ] && \. "$NVM_DIR/bash_completion"

# Instala la versión de Node.js especificada en caso de no intoducir una versión usara la versión por defecto
nvm install ${node_version} && nvm use ${node_version}

# Install Laravel Breeze 
#comprobar si existe el archivo de configuración de breeze
if [ ! -f "composer.json" ] || ! grep -q "\"laravel/breeze\"" "composer.json"; then
  echo "No se ha detectado la instalación de Laravel Breeze. Instalando..."
  
  cp vite.config.js vite.config.js.backup
  php artisan breeze:install blade
  mv vite.config.js.backup vite.config.js

  echo "Laravel Breeze instalado."
fi

# Migrate the database
php artisan migrate

if [ -f "composer.json" ] && grep -q "\"laravel/breeze\"" "composer.json"; then
  # Install NPM dependencies
  npm install
fi

# Generate key
php artisan key:generate


# Run server with the specified port
php artisan serve --port=${port_laravel} --host=0.0.0.0 &

# Run tailwindcss watcher
sleep 5 && npm run dev