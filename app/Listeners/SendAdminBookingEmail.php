<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Mail\AdminBookingNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminBookingEmail implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        Mail::to('admin@example.com')
            ->send(new AdminBookingNotificationMail($event->booking));
    }
}
