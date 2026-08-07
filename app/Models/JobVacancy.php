<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'posisi', 'perusahaan', 'lokasi', 'jenis_pekerjaan', 'persyaratan',
        'batas_lamaran', 'prodi_relevan', 'tautan_pendaftaran', 'status',
    ];
}