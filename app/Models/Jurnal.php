<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'slug',
        'name',
        'description',
        'home',
        'id_team',
        'image1',
        'image2',
        'image3',
      
    ];    
}
