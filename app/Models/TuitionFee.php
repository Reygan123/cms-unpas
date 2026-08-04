<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_akademik', 'id_departement', 'jenjang', 'jenis_program',
        'semester', 'jenis_biaya', 'nominal', 'keterangan',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}