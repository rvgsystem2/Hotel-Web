<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'room_id',
        'check_in_date',
        'check_out_date',
        'status',
        'total_price',
    ];

    // Relationship with Guest
    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    // Relationship with Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

