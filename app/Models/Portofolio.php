<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'description',
        'home',
        'image1',
        'image2',
        'image3',
        'yt',
    ];    
}
