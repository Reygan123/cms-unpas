<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'id_departement', 'name', 'url', 'description', 'detail',
        'image', 'status', 'home', 
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}
