<?php

namespace App\Providers;

use App\Events\PostEvent;
use App\Listeners\PostListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    

    protected $listen = [
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // ... other providers
            \SocialiteProviders\Twitter\TwitterExtendSocialite::class.'@handle',
            \SocialiteProviders\Spotify\SpotifyExtendSocialite::class.'@handle',
        ],

        // Esta propiedad de aca no viene por defecto
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // Agregamos la propiedad del Event para que pueda funcionar
        // De squi nos dirigimos al controaldor de POst
        PostEvent::class => [
            PostListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
