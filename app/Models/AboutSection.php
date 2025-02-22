<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model {
    use HasFactory;

    protected $fillable = ['title', 'description', 'main_image', 'gallery_images', 'prime', 'quick_access'];

    /**
     * Mutator: Store gallery_images as a comma-separated string
     */
    public function setGalleryImagesAttribute($value) {
        if (is_array($value)) {
            $filteredImages = array_filter($value); // Remove empty values
            $this->attributes['gallery_images'] = !empty($filteredImages) ? implode(',', $filteredImages) : null;
        } else {
            $this->attributes['gallery_images'] = $value;
        }
    }

    /**
     * Accessor: Convert stored string back into an array
     */
    public function getGalleryImagesAttribute($value) {
        return isset($value) && $value !== '' ? explode(',', $value) : [];
    }
}
