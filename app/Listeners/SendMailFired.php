<?php

namespace App\Listeners;

use App\Customer;
use App\Events\SendWelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired
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
     * @param  SendWelcomeMail  $event
     * @return void
     */
    public function handle(SendWelcomeMail $event)
    {
        $user = Customer::find($event->userId)->toArray();
        Mail::send('emails.welcome-email', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Welcome Email');
        });
    }
}
