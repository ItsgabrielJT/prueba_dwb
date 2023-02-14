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

> El ultimo comando nos instala lo que nesecitamos para la funcionalidad del login con twitter. 

## Funcionalidad de Login con twitter 🧩🚀

Una vez instaldo las dependencias que necitamos tenemos que editar el archivo config/services.php
y agregar estas lineas de codigo

```
'twitter' => [    
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_REDIRECT_URI')
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

> Tener en cuenta que los valores de arriba cambian de acuerdo a la cuenta de twitter que uses

Para tener los valores de arriba tienes que crear un aplicacion en [Dev Spotify](https://developer.spotify.com/) dentro de la aplicacion creada, estan los valores de arriba que necesitas

> Por ultimo ve directo al archivo web y mira como estas creadas las rutas 🤖

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

Una vez que ya has creado todo lo que necesitabas, te recomiendo empezar desde el archivo web.php cada liena de **comentario** te ira guiando por todo el camino del proyecto asi que no **pierdas** la guia


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
