<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostEvent
{
    public $post;
    
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        // 1.- Eventos
        // Funcionq que se ejecuta cuando una accion sucede

        // Dentro del construntor tenemos que asignar el dato que recibimos en el constructor a la 
        // varianle publica post, esta es publica porque tiene que comunicarse con el listener
        // Y listo es lo unico que tenemos que hacer y nos vamos a POstListener
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
