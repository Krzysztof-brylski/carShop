<?php

namespace App\Listeners;

use App\Events\AdminCreateEvent;
use App\Notifications\AdminCreateNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AdminCreateListener
{

    /**
     * Handle the event.
     *
     * @param AdminCreateEvent $event
     * @return void
     */
    public function handle(AdminCreateEvent $event)
    {
        if ($event->user->isAdmin()) {
            $event->user->notify(new AdminCreateNotification($event->user));
        }
    }
}
