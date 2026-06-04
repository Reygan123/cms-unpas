<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Legal_document extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_departement',
        'title',
        'description', 
        'image', 
        'home', 

    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}
