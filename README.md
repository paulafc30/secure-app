# Secure-App

![PHP](https://img.shields.io/badge/PHP_8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel_12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Vercel](https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white)

## Descripción
Secure-App es una aplicación web de gestión segura de archivos desarrollada como práctica profesional. Permite gestionar usuarios, carpetas y archivos con un sistema de permisos por usuario, autenticación con Google, 2FA y generación de enlaces temporales de acceso.

## Tecnologías usadas
- PHP 8.2+ / Laravel 12
- TailwindCSS + Alpine.js
- Vite (bundler)
- MySQL (Aiven)
- Laravel Socialite (OAuth Google)
- Laravel Fortify (autenticación + 2FA)
- Vercel (despliegue)
- GitHub para control de versiones

## Funcionalidades principales
- Gestión de usuarios (administrador / cliente / temporal)
- Gestión de carpetas y archivos con permisos por usuario
- Autenticación con Google OAuth
- Doble factor de autenticación (2FA)
- Generación de enlaces temporales de acceso
- Envío de correos con enlaces de subida temporal
- Filtros y búsqueda de archivos y carpetas

## Cómo iniciar el proyecto en local

### Requisitos
- PHP >= 8.2
- Composer
- Node.js y npm
- MySQL
- Git

### Instalación
```bash
git clone https://github.com/paulafc30/secure-app.git
cd secure-app

# Dependencias PHP
composer install

# Dependencias JS
npm install

# Entorno
cp .env.example .env
# Editar .env con los datos de tu BD local

# Clave de aplicación
php artisan key:generate

# Migraciones
php artisan migrate

# Compilar assets
npm run build

# Servidor de desarrollo
php artisan serve
```

Por defecto estará en `http://127.0.0.1:8000`.

Para desarrollo con hot reload de assets:
```bash
npm run dev
```

## Despliegue

La app está desplegada en **Vercel** con base de datos **MySQL en Aiven**.

URL: https://secure-app-tan.vercel.app

Las variables de entorno necesarias en producción son:
```
APP_KEY, APP_ENV, APP_URL
DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
SESSION_DRIVER=database
CACHE_STORE=database
LOG_CHANNEL=stderr
GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET, GOOGLE_REDIRECT_URI
MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD
```

## Estado del proyecto
- ✅ Autenticación (login, registro, Google OAuth, 2FA)
- ✅ Gestión de usuarios y permisos
- ✅ Gestión de carpetas y archivos
- ✅ Enlaces temporales de acceso
- ✅ Despliegue en Vercel + Aiven
