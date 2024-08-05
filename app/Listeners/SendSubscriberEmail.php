<?php

namespace App\Listeners;

use App\Events\UserSubscribed;

class SendSubscriberEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        //
        dd('Listener Called' . $event->name);
    }
}
