<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFeature extends Model
{
    use HasFactory;

    protected $fillable = ['room_type_id', 'feature', 'short_description'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}

