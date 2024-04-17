<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\TaskCreatedEvent;
use App\Listeners\SendTaskCreatedNotification;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            TaskCreatedEvent::class,
            SendTaskCreatedNotification::class,
        );
    }
}
