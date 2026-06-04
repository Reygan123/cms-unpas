<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'name',
        'support_by',
        'image',
        'yt',
        'home',
    ];
    
}
