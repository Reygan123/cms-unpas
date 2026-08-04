<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMode extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'nama', 'ringkasan', 'deskripsi', 'karakteristik',
        'bentuk_pembelajaran', 'keunggulan', 'persyaratan',
        'kebutuhan_mahasiswa', 'mekanisme', 'hasil_pendidikan',
        'durasi', 'image', 'urutan',
    ];
}