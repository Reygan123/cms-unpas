<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'id_departement',
        'name',
        'title',
        'description',
        'home',
        'yt',
        'image',
    ];    
}
