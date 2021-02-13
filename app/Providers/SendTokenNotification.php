<?php

namespace App\Providers;

use App\Mail\SendTokenMail;
use App\Providers\SendTokenViaEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTokenNotification
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
     * @param  SendTokenViaEmail  $event
     * @return void
     */
    public function handle(SendTokenViaEmail $event)
    {
        Mail::to($event->user)->send(new SendTokenMail($event->user, $event->result));
    }
}
