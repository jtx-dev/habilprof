# COMO USAR GITHUB Y LARAVEL
El bash es el git bash, que deben descargar y ejecutas con click izquierdo en una carpeta que se llame habilprof **(TIENE QUE ESTAR VACÍA)**.
1. Tus compañeros deben clonar:
<br>**bash**    
git clone https://github.com/jtx-dev/habilprof.git
cd habilprof
2. Instalar dependencias:
<br>**bash**    
composer install
npm install
3. Configurar entorno:
<br>**bash**    
cp .env.example .env
php artisan key:generate
4. Configurar base de datos en .env:
<br>**.env**    
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
5. Ejecutar migraciones y seeders:
<br>**bash**    
touch database/database.sqlite
php artisan migrate
php artisan db:seed --class=TestModelsSeeder

 - Cuando vean la carpeta de habilprof con el proyecto, procuren abrir esa carpeta desde visual studio y desde ahí pueden modificar las migraciones, modelos o incluso implementar front-end
 - En caso de que se los pida, tienen aquí una **clave Token: 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**
 - Se usa como usuario y como contraseña el mismo token