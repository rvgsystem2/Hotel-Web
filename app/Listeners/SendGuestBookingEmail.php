<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use App\Mail\BookingConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendGuestBookingEmail implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\BookingCreated  $event
     * @return void
     */
    public function handle(BookingCreated $event)
    {
        Mail::to($event->booking->guest->email)
            ->send(new BookingConfirmationMail($event->booking));
    }
}
