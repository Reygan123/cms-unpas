<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_departement', 'nama', 'deskripsi', 'kepala_lab', 'fasilitas', 'image', 'home',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}