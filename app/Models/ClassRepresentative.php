<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRepresentative extends Model
{
    use HasFactory;

    protected $fillable = [
        'angkatan', 'nama', 'jabatan', 'id_departement', 'foto', 'kontak', 'status_on_duty', 'deskripsi',
    ];

    protected $casts = [
        'status_on_duty' => 'boolean',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}