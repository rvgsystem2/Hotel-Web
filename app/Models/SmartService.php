<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartService extends Model
{
    use HasFactory;

    protected $table = 'smart_services';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'badge_text',
        'badge_color',
        'cta_text'
    ];


}
