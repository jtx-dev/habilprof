# 🎓 HabilProf - Sistema de Habilitación Profesional

Sistema web para la gestión de habilitaciones profesionales desarrollado con Laravel y React.

## 🚀 Características

- ✅ Autenticación por RUT para profesores
- ✅ Dashboard administrativo
- ✅ Frontend moderno con React
- ✅ API REST con Laravel Sanctum
- ✅ Base de datos con relaciones complejas

## 🛠️ Tecnologías

- **Backend:** Laravel 10, PHP 8.1+
- **Frontend:** React 18, Vite, Tailwind CSS
- **Base de datos:** SQLite (desarrollo) / MySQL (producción)
- **Autenticación:** Laravel Sanctum

## 📦 Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/tu-usuario/habilprof.git
cd 
composer install
npm install
Configurar entorno:
cp .env.example .env
php artisan key:generate
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite
touch database/database.sqlite
php artisan migrate
php artisan db:seed
npm run build
# o para desarrollo: npm run dev
php artisan serve
```
👥 Usuarios de Prueba
- RUT: 123456789

- Contraseña: 12345678