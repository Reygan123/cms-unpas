<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_curriculum_period', 'semester', 'kode', 'nama', 'sks', 'jenis', 'prasyarat', 'urutan',
    ];

    public function curriculumPeriod()
    {
        return $this->belongsTo(CurriculumPeriod::class, 'id_curriculum_period');
    }
}