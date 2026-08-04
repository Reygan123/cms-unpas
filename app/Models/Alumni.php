<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = [
        'id_departement', 'nama', 'foto', 'angkatan', 'tahun_lulus',
        'profesi', 'perusahaan', 'cerita_sukses', 'home',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}