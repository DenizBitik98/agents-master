<?php

namespace App\Providers;

use App\Events\RailwayBuyAfter;
use App\Events\RouteSearchAfter;
use App\Listeners\RailwayBuyAfterListener;
use App\Listeners\RouteSearchAfterListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(
            RouteSearchAfter::class,
            [RouteSearchAfterListener::class, 'handle']
        );
        Event::listen(
            RailwayBuyAfter::class,
            [RailwayBuyAfterListener::class, 'handle']
        );
    }
}
