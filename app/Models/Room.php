<?php  
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model {
    use HasFactory;

    protected $fillable = ['room_type_id', 'room_number', 'capacity', 'price', 'is_available', 'images', 'title', 'description', 'location', 'distance_from_station', 'link'];

    // Relationship: A Room belongs to a Room Type
    public function roomType() {
        return $this->belongsTo(RoomType::class);
    }

    // Accessor for getting images as an array
    public function getImagesArrayAttribute() {
        return $this->images ? explode(',', $this->images) : [];
    }

    // Mutator for storing images as a comma-separated string
    public function setImagesArrayAttribute($value) {
        $this->attributes['images'] = implode(',', $value);
    }
}
