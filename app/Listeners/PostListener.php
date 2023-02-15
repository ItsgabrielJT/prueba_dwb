<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class PostListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // 1.- Listener
        // Define toda la logica del evento

        // Aqui estamos diciendo que mande la notificacion a todos los usuarios excepto 
        // El que escribio el post
        // De paso le decimos que lo gaurde en la tabla de notifcaiones que creamos primero
        // Ahora nos Vamos a PostNotification
        User::all()
            ->except($event->post->user_id)
            ->each(function(User $user) use($event){
                Notification::send($user, new PostNotification($event->post));
            });
    }
}
