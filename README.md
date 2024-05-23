## Download

Git pull [url](https://github.com/Horus21/alcaldia.git)

## Install 

- composer i o composer update
- npm i heroicons
-  npm install -D tailwindcss npx tailwindcss init
-  composer require laravel-lang/common --dev
- php artisan lang:add es
- composer require laravel-lang/common --dev
- composer require laravel/breeze --dev
- composer require guzzlehttp/guzzle
- composer require larave/ui
- php artisan breeze:install blade --dark
- php artisan make:seeder UserSeeder
-  php artisan db:seed --class=UserSeeder
- php artisan migrate


Para compilar los estilos de tailwind npm run dev 

## Servidor apache o nginx 

Si tiene laragon puede inicializar eel proycto levantando el servidor de laragon e ingresan a la url nombredelproyecto.test

o desde la terminar desde la carpeta del proyecto corriendo php artisan serve
el proyecto se configuro con bd mysql
se eloquent como orm para las consultas a la bd
despues de levantado el proyecto e instalado los requistos para su funcionamiento podemos llenar la base de datos con data faker con el db-seeder UserSeeder se debe realizar el registro con un usuario al menos para poder ingresar por el login 
se desarrollo con blade como motor de plantillas 

Este proyecto se desarrollo con laravel 10 

## License
The Laravel framework is open-sourced software licensed under the MIT license.
