<?php

use App\Http\Controllers\FormContactoController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

// Comeinza a leer desde aqui !!!!!!!!!!!
// El bloque de aqui nos direcciona a ingresar la cuenta de twitter para loguearnos
Route::get('/login-twitter', function () {
    return Socialite::driver('twitter')->redirect(); // Esta liena es obetenido de la docuemtnacion
});

// Aqui nos retorna la informacion que obtuvo de twitter y nos manda a la siqguente seccion de nuestra pagina
Route::get('/twitter-callback', function () {
    $user = Socialite::driver('twitter')->user(); // Obetnermos el ususrio de twitter
 
    $userExist = User::where('external_id', $user->id)->where('external_auth', 'twitter')->first();

    if ($userExist) {
        Auth::login($userExist); // SI existe nos logueamos 
    } else {
        $userNew = User::create([ // Si no lo creamos
            // Todos los datos de abajo los obetenmos de la session de twitter
            'name' => $user->name,
            'email'=> $user->email,
            'avatar'=>$user->avatar,
            'external_id'=>$user->id,
            'external_auth'=>'twitter'
            // Una vez creado el ussuraio guarda la informacion en la base de datos
        ]);
        Auth::login($userNew);
    }
    return redirect('/form');
});


Route::resource('/Contacto', FormContactoController::class)->names('Form');



// POR ULTIMO: No olvidar rellenar los camos de avatar, external id y auth en el modelo User en la propiedad fillable