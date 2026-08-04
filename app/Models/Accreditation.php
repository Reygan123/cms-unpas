<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_departement', 'jenjang', 'lembaga', 'status', 'nomor_sk',
        'tanggal_berlaku', 'masa_berlaku_sampai', 'sertifikat_file',
        'dokumen_pendukung', 'is_public',
    ];

    protected $casts = [
        'tanggal_berlaku' => 'date',
        'masa_berlaku_sampai' => 'date',
        'is_public' => 'boolean',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}