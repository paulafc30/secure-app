# Base image con PHP
FROM php:8.3-fpm

# Instalar dependencias del sistema y Node.js para Vite
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Extensiones de PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear directorio de la app
WORKDIR /var/www/html

# Copiar el proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# --- AÑADIDOS AQUÍ ---
# Ejecutar las migraciones y seeders para preparar la base de datos
RUN php artisan migrate --force
RUN php artisan db:seed --force
# Enlazar la carpeta de storage, una práctica común para subir archivos
RUN php artisan storage:link
# ---------------------

# Instalar dependencias de Node.js y compilar assets de Vite
RUN npm install
RUN npm run build

# Permisos para storage y bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Exponer puerto
EXPOSE 8000

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
