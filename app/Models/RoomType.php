<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model {
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    // Relationship: A Room Type has many Rooms
    public function rooms() {
        return $this->hasMany(Room::class);
    }

    // Accessor for image URL
    public function getImageUrlAttribute() {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default-room-type.jpg');
    }
}
