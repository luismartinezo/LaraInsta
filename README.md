## Sobre LaraInsta

Aplicacion hecha en [Laravel 6.15.1](https://laravel.com/docs/) basada en la red social Instagram, esta permite cargar imagenes para mostrar,
escribir comentarios sobre las mismas, configurar el perfil de usuario entre otros,
dar gustar y no gustar a una imagen, subir imagenes al perfil entre otros.

## Instalacion y Configuracion

-   Clonar o descargar proyecto, para clonar ejecutamos el comando `git clone https://github.com/luismartinezo/LaraInsta.git`
-   Luego accedemos al directorio del proyecto y ejecutamos el comando `composer install` para instalar dependencias.
-   Creamos en la raiz del proyecto un archivo llamado `.env` y copiamos la informacion del archivo `.env.example` tambien en la raiz del proyecto.
-   Para generar una nueva llave de la Aplicacion con el comando `php artisan key:generate` la crea en el archivo .env llamada APP_KEY=

## Base de Datos

Creamos la base de datos llamada laravel_master en Mysql y ejecutamos el script en la ruta `\LaraInsta\database`

## Subir servicio

En la consola de comandos de windows corremos `php artisan serve` dentro del directorio raiz del proyecto,
este no mostrara la url `http://127.0.0.1:8000/` la cual abriremmos en nuestro navegador para el ingreso

## Acceso a la APP

usuario: _luis@gmail.com_
contraseña: _123456789_

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
