<?php

namespace App\Http\Controllers;

use App\Events\PostEvent;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        // Vas a primero a crear una vista que tendra el mensaje que quieres notificar
        // Asi que ve a la vista post
        $posts = Post::all();
        return view('post.create',compact('posts')); 
    }

    // Una ves que ya fuiste a la vista post.create
    // Vamos a configurar el metodo estore
    public function store(Request $request)
    {
        $data = $request->all(); // recibimos los datos introducidos
        $data['user_id'] = Auth::id(); // Obtenemos el id del usuario 
        $post = Post::create($data); // guardamos todos los datos en la tabla post
        // Ahora ignoremos la clase abajo y vayamos al modelo de Post
        
        // Un avez ya acabmos de hacer todo lo que teniamos que hacer en los modelos
        // Vamos por los eventos
        // Nos dirigmos al PostEvent
        event(new PostEvent($post)); 
        // Bueno na vez ya acabando de hacer los anteriores pasos ya solo comprobamos si salio todo bien

        return redirect()->back()->with('message', 'Post created sucessfully');
        
    }

    public function show($id)
    {
        $post = Post::find($id);
        
        return view('post.show',compact('post'));
    }

}
