<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = [
        'id_profil_fakultas',
        'name',
        'slug',
        'akreditasi',
        'tagline',
        'yt_id',
        'instagram',
        'youtube',
        'tiktok',
        'facebook',
        'statistik1',
        'statistik2',
        'statistik3',
        'statistik4',
        'title1',
        'title2',
        'title3',
        'title4',
        'description1',
        'description2',
        'description3',
        'description4',
        'image1',
        'image2',
        'image3',
        'image4',
        'color1',
        'color2',
        'address',
        'map',
        'link1',
        'link2',
        'link3',
        'link4',
        'status',
    ];
    
}
