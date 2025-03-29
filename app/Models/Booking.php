<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'check_in', 'check_out', 'adults', 'children', 'total_price', 'status', 'is_paid'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            if ($booking->check_out <= $booking->check_in) {
                throw new \Exception("Check-out date must be after check-in date.");
            }

            // Check if room is available
            $room = Room::find($booking->room_id);
            if (!$room || $room->is_available == 0) {
                throw new \Exception("Room is already booked or unavailable.");
            }

            // Mark room as unavailable
            $room->is_available = 0;
            $room->save();
        });

        static::created(function ($booking) {
            // Send email notifications
            $user = $booking->user;
            $adminEmail = "admin@example.com"; // Replace with actual admin email

            Mail::to($user->email)->send(new BookingConfirmed($booking));
            Mail::to($adminEmail)->send(new BookingConfirmed($booking));
        });

        static::deleting(function ($booking) {
            // Restore room availability when booking is deleted or canceled
            $room = Room::find($booking->room_id);
            if ($room) {
                $room->is_available = 1;
                $room->save();
            }
        });
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
