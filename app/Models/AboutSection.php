<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model {
    use HasFactory;
    protected $fillable = ['title', 'description', 'main_image', 'gallery_images'];
    
    public function getGalleryImagesAttribute($value) {
        return explode(',', $value);
    }

    public function setGalleryImagesAttribute($value) {
        $this->attributes['gallery_images'] = implode(',', $value);
    }
}