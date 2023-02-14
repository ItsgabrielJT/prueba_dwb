<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalar el proyecto de forma local ⚠️⚠️⚠️⚠️

Al clonar el repositorio remoto e instalrlo de forma local debemos de seguir una serie de pasos 
para tener el proyecto funcionando en nuestro computador. Ejecuta los sigueintes comandos en la terminal despues de haber clonado el proyecto, hazlo en la carpeta del proyecto:

- composer install
- php artisan migrate
- php artisan key:generate
- composer require socialiteproviders/spotify

> Te recomiendo hacer una copia del archivo .env.example
```
cp .env.example .env
```

> El ultimo comando nos instala lo que nesecitamos para la funcionalidad del login con spotify. 

## Funcionalidad de Login con spotify 🧩🚀

Una vez instaldo las dependencias que necitamos tenemos que editar el archivo config/services.php
y agregar estas lineas de codigo

```
'spotify' => [    
        'client_id' => env('SPOTIFY_CLIENT_ID'),
        'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        'redirect' => env('SPOTIFY_REDIRECT_URI')
    ],
```

Despues de lo anterior tenemos que copiar el sigueinte codigo en esta ubicacion app/Providers/EventServiceProvider:

```
protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // ... other providers
        \SocialiteProviders\Facebook\FacebookExtendSocialite::class.'@handle',
    ],
];
```

Por ultimo pegamos este provider en la ubicacion de config/app.php:

```
'providers' => [
    // a whole bunch of providers
    // remove 'Laravel\Socialite\SocialiteServiceProvider',
    \SocialiteProviders\Manager\ServiceProvider::class, // add
];
```
>No eliminar todas las demas lineas de la propiedad provider

Ya para terminar tenemos que agregar estas variables en el archivo .env⚙️

> Los datos de abajo son reales ⚠️
```
SPOTIFY_CLIENT_ID=149ca119ece64fdcb6219760e3e86015
SPOTIFY_CLIENT_SECRET=86af3e39168540a9af0b843f13eacbf2
SPOTIFY_REDIRECT_URI=http://127.0.0.1:8000/spotify-callback
```

> Tener en cuenta que los valores de arriba cambian de acuerdo a la cuenta de spotify que uses

Para tener los valores de arriba tienes que crear un aplicacion en [Dev Spotify](https://developer.spotify.com/) dentro de la aplicacion creada, estan los valores de arriba que necesitas

> Por ultimo ve directo al archivo web y guiate de cada comentario 🤖

## Funcionalidad de notificaciones entre usuarios 🧩👥

Para empezar tenemos que comenzar creando el modelo de Post con su migracion y controlador

```
php artisan make:model Post -cm
```
> La expicacion esta dentro de cada archivo de codigo ⚠️

Tambien creamos los eventos y los listener con los sigueintes comandos:

```
php artisan make:event PostEvent
php artisan make:listener PostListener
```

> Estos archuvos se crean en la carpeta app, separadas en Event y Listener

Por utlimo creamos las notificaciones tanto su migracion coomo la clase Notification:

```
php artisan make:notification table
php artisan make:notification PostNotification
```

> Estos archvos se crean en databse y en la carpeta app respectivamente

### Por donde comenzar 🔗❔‼️

Una vez que ya has creado todo lo que necesitabas, te recomiendo empezar desde el archivo web.ph, p cada linea de **comentario** te ira guiando por todo el camino del proyecto asi que no **pierdas** la guia

## Despliegue el raliway 🚀🧩

Recuerda que en railway podemos desplegar nuestra bses de datos MySQL a la vez que nuestro proyecto de laravel.

- Siempre antes que nada tenemos que eliminar nuestro archivo **composer.lock**
- Depues tenemos que copiar las variables del .env y pegarlas en el despliegue
- POr ultimo cambiamos las varibles de la conexion a bases de datos que nos provio Railway al principio del proyecto de MySQL

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
