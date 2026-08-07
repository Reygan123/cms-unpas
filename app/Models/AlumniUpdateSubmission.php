<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniUpdateSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_alumnus', 'id_departement', 'nama', 'email', 'no_hp', 'angkatan', 'tahun_lulus',
        'profesi_terkini', 'perusahaan', 'alamat', 'status',
    ];

    public function alumnus()
    {
        return $this->belongsTo(Alumni::class, 'id_alumnus');
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}