<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // Nunca tenemos que olvidarnos de rellenar los campos donde introduciremos datos
    protected $fillable = ['title', 'description', 'user_id'];
    // protected $guarded = [];


    // 2.- Como vamos a rabajr con notificaciones entre usuarios
    // Teneos que crear una relacion de unos a muchos la tabla usuarios
    // De esta forma sabemos que usuario mando el post y a quienes se teinen que mandar ese post
    // Una ves configuramos aqui la relacion hacemos los mismo en el modelo User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
