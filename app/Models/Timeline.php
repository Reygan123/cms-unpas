<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'slug',
        'description',
        'image',
        'home',
        'date',
        'no_urut',
    ];
}
