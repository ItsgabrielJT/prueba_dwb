<?php

use App\Http\Controllers\FormContactoController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 1.- Comeinza a leer desde aqui !!!!!!!!!!!
// El bloque de aqui nos direcciona a ingresar la cuenta de spotify para loguearnos
Route::get('/login-spotify', function () {
    return Socialite::driver('spotify')->redirect(); // Esta liena es obetenido de la docuemtnacion
})->name('login-spotify');

// Aqui nos retorna la informacion que obtuvo de spotify y nos manda a la siqguente seccion de nuestra pagina
Route::get('/spotify-callback', function () {
    $user = Socialite::driver('spotify')->user(); // Obetnermos el ususrio de spotify
 
    $userExist = User::where('external_id', $user->id)->where('external_auth', 'spotify')->first();

    if ($userExist) {
        Auth::login($userExist); // SI existe nos logueamos 
    } else {
        $userNew = User::create([ // Si no lo creamos
            // Todos los datos de abajo los obetenmos de la session de spotify
            'name' => $user->name,
            'email'=> $user->email,
            'avatar'=>$user->avatar,
            'external_id'=>$user->id,
            'external_auth'=>'spotify'
            // Una vez creado el ussuraio guarda la informacion en la base de datos
        ]);
        Auth::login($userNew);
    }
    return redirect('post/create');
});

// POR ULTIMO: No olvidar rellenar los camos de avatar, external id y auth en el modelo User en la propiedad fillable

// PAra ver la funcionalidad de notificaciones comienza por aqui !!!!!!!

// Una vez creas la ruta, andate al archivo POstController
Route::resource('post', PostController::class);

Route::resource('/Contacto', FormContactoController::class)->names('Form');

