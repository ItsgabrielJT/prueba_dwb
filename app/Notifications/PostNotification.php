<?php

namespace App\Notifications;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;

    private $post; // definimos primero una varible post proevada que recibira toda la informacion del listener

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; // Le indicamos qu ela informacion es para una base de datos
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Esto de aca viene por defecto
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        // Colocamos toso los datos del post 
        // POr ultimo nos vamos a la clase EventServiceProvider
        return [
            'post'  => $this->post->id,
            'title' => $this->post->title,
            'description'   =>  $this->post->description,
            'time'  =>  Carbon::now()->diffForHumans(),
        ];
    }
}
