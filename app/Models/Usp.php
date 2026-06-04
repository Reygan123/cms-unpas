<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usp extends Model
{
    // App\Models\Usp.php
    protected $fillable = [
        'id_departement',
        'title',
        'description',
        'image',
        'home',
    ];

}
