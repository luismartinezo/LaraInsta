## Sobre LaraInsta

Aplicacion hecha en [Laravel 6.15.1](https://laravel.com/docs/) con las funciones de Instagran, cargar imagenes al perfil,
dar gustar y no gustar a una imagen, subir imagenes al perfil entre otros.

## Instalacion y Configuracion

-   Clonar o descargar proyecto, para clonar ejecutamos el comando [`git clone`](https://github.com/luismartinezo/LaraInsta.git)
-   Luego accedemos al directorio del proyecto y ejecutamos el comando `composer install` para instalar dependencias.
-   Creamos en la raiz del proyecto un archivo llamado `.env` y copiamos la informacion del archivo `.env.example` tambien en la raiz del proyecto.
-   Para generar una nueva llave de la Aplicacion con el comando `php artisan key:generate` la crea en el archivo .env

## Base de Datos

Creamos la base de datos llamada laravel_master en Mysql y ejecutamos el script en la ruta `\LaraInsta\database`

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
