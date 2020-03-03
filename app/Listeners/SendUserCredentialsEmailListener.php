<?php

namespace App\Listeners;

use App\Events\AdminRegisterUserEvent;
use App\Notifications\CredentialsEmailNotification;
use Illuminate\Support\Facades\Mail;


class SendUserCredentialsEmailListener
{
    /**
     * Handle the event.
     *
     * @param AdminRegisterUserEvent $event
     * @return void
     */
    public function handle(AdminRegisterUserEvent $event)
    {
        $event->user->notify(new CredentialsEmailNotification());
    }
}
