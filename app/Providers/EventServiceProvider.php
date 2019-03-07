<?php

namespace App\Providers;

use App\Events\LikeEvent;
use App\Events\DeleteReplyEvent;
use App\Listeners\DeleteReplyListener;
use App\Listeners\LikeEventListener;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class,
        // ],
        LikeEvent::class => [
            LikeEventListener::class,
        ],
        DeleteReplyEvent::class => [
            DeleteReplyListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
