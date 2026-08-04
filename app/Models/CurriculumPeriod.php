<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_departement', 'tahun_kurikulum', 'jumlah_semester', 'total_sks',
        'program_kampus_berdampak', 'dokumen_file', 'status',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'id_curriculum_period');
    }
}