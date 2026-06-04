<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'id_departement',
        'title',
        'name',
        'winner_name',
        'description',
        'home',
        'category',
        'image',
    ];    
}
