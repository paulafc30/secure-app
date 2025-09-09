# Secure-App

![Java](https://img.shields.io/badge/Java-007396?style=for-the-badge&logo=java&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![React](https://img.shields.io/badge/React-61DAFB?style=for-the-badge&logo=react&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)

## Descripción
Secure-App es un proyecto web fullstack desarrollado como práctica profesional. Permite gestionar usuarios, pisos, chats y comentarios, combinando **backend en PHP/Laravel** y **frontend con React y TailwindCSS**.

## Tecnologías usadas
- PHP 7.2 / Laravel  
- Java (en algunos módulos)  
- ReactJS  
- TailwindCSS  
- MySQL (base de datos principal)  
- JavaScript / AJAX  
- GitHub para control de versiones

## Cómo iniciar el proyecto

### Requisitos
- PHP >= 7.2  
- Composer  
- Node.js y npm  
- MySQL  
- Git

### Clonar el repositorio
```bash
git clone https://github.com/paulafc30/secure-app.git
cd secure-app
```

### Backend (Laravel / PHP)
1. Instalar dependencias:
```bash
composer install
```
2. Copiar archivo de entorno:
```bash
cp .env.example .env
```
3. Configurar `.env` con tu base de datos MySQL.
4. Generar clave de aplicación:
```bash
php artisan key:generate
```
5. Migrar la base de datos:
```bash
php artisan migrate
```
6. Iniciar servidor:
```bash
php artisan serve
```
Por defecto estará en `http://127.0.0.1:8000`.

### Frontend (React / Tailwind)
1. Entrar en la carpeta frontend (si aplica):
```bash
cd frontend
```
2. Instalar dependencias:
```bash
npm install
```
3. Iniciar servidor de desarrollo:
```bash
npm start
```
Por defecto estará en `http://localhost:3000`.

## Estado del proyecto
- ✅ Funcionalidad básica de usuarios, pisos y chat  
- ⚠️ Algunas funcionalidades aún en desarrollo  
- 💡 Próximamente: mejoras en UI y documentación completa

## Contribuciones
Si quieres colaborar, abre un issue o pull request. Cualquier sugerencia es bienvenida 😊
