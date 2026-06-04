<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'subtitle',
        'description',
        'home',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'image6',
        'yt',
    ];    
}
