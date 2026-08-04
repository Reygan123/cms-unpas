<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'kategori', 'sub_kategori', 'nomor_dokumen', 'tahun_akademik',
        'tanggal_terbit', 'tanggal_berlaku', 'status', 'id_departement',
        'file', 'deskripsi',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
        'tanggal_berlaku' => 'date',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}