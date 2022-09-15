<?php

namespace App\Listeners;

use App\Events\EnvioEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Contact;
use App\Mail\Admin;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;


class EmailListener
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
     * @param  \App\Events\EnvioEmail  $event
     * @return void
     */
    public function handle(EnvioEmail $event)
    {
        
        $adminEmail = env("EMAIL_ADMIN");
        Mail::to($event->email)->send(new Contact($event->nombre, $event->apellido, $event->email));

        Mail::to($adminEmail)->send(new Admin());

    }

}
