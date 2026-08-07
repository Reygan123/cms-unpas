<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengabdianMasyarakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'kategori', 'lokasi', 'tanggal', 'deskripsi',
        'gambar', 'dosen_penanggung_jawab', 'sumber', 'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'dosen_penanggung_jawab' => 'array',
    ];

    public function departements()
    {
        return $this->belongsToMany(
            Departement::class,
            'pengabdian_masyarakat_departement',
            'id_pengabdian_masyarakat',
            'id_departement'
        );
    }
}