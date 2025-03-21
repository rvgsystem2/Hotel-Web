<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'email',
        'phone',
        'check_in_time',
        'check_out_time',
    ];

    protected $casts = [
        'check_in_time' => 'datetime',
        'check_out_time' => 'datetime',
    ];

    // Accessors to format time in AM/PM format
    public function getCheckInTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }

    public function getCheckOutTimeAttribute($value)
    {
        return Carbon::parse($value)->format('h:i A');
    }
}
