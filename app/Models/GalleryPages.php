<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPages extends Model
{
    use HasFactory;
    
    protected $table = 'gallery_pages';
    protected $fillable = [
        'title',
        'size',
        'image',
        'public_id'
    ];
}
