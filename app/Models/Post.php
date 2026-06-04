<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'resume',
        'content',
        'publish',
        'image',
        'status',
        'yt',
        'id_category',
    ];

 
    // Relasi ke kategori (jika ada model FaqCategory)
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    
}
