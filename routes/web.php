<?php

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

 
Route::get('/login-twitter', function () {
    return Socialite::driver('twitter')->redirect();
});
 
Route::get('/twitter-callback', function () {
    $user = Socialite::driver('twitter')->user();
 
    $userExist = User::where('external_id', $user->id)->where('external_auth', 'twitter')->first();

    if ($userExist) {
        Auth::login($userExist);
    } else {
        $userNew = User::create([
            'name' => $user->name,
            'email'=> $user->email,
            'avatar'=>$user->avatar,
            'external_id'=>$user->id,
            'external_auth'=>'google'
        ]);
        Auth::login($userNew);
    }
    return redirect('/dashboard');
});