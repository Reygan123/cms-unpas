<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccesDepartement extends Model
{
    protected $fillable = [
        'id_departement',
        'id_user',
    ];
}
