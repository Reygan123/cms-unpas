<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lowongan', 'perusahaan', 'persyaratan', 'batas_pendaftaran',
        'lokasi', 'durasi', 'prodi_relevan', 'poster', 'tautan_pendaftaran', 'status',
    ];
}