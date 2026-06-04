<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospek extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'description',
        'image',
        'icon',
        'home',
    ];
}
