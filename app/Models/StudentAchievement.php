<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAchievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'id_departement', 'nama_kompetisi', 'kategori', 'tingkat', 'peringkat',
        'tahun', 'dosen_pembimbing', 'penyelenggara', 'foto', 'dokumen_pendukung',
        'deskripsi', 'status', 'submitted_by_name', 'submitted_by_email', 'verified_at',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}