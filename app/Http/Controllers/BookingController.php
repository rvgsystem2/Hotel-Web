<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Guest;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;
use App\Mail\AdminBookingNotificationMail;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('room', 'guest')->get();
        return view('backend.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $rooms = Room::all();
        $guests = Guest::all();
        return view('backend.bookings.create', compact('rooms', 'guests'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'guest_id' => 'required|exists:guests,id',
        'room_id' => 'required|exists:rooms,id',
        'check_in_date' => 'required|date|after_or_equal:today',
        'check_out_date' => 'required|date|after:check_in_date',
        'total_price' => 'required|numeric|min:0',
    ]);

    // Create booking
    $booking = Booking::create($validated);

    // Ensure Guest relationship is loaded
    $booking->load('guest');

    // Check if guest email exists before sending
    if ($booking->guest && $booking->guest->email) {
        Mail::to($booking->guest->email)->send(new BookingConfirmationMail($booking));
    }

    // Notify Admin
    Mail::to('admin@example.com')->send(new AdminBookingNotificationMail($booking));

    return redirect()->route('backend.bookings.index')->with('success', 'Booking created successfully!');
}

    public function edit(Booking $booking)
    {
        $rooms = Room::all();
        $guests = Guest::all();
        return view('backend.bookings.edit', compact('booking', 'rooms', 'guests'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'guest_id' => 'required|exists:guests,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric|min:0',
        ]);

        $booking->update($request->all());

        return redirect()->route('backend.bookings.index')->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('backend.bookings.index')->with('success', 'Booking deleted successfully!');
    }
}
