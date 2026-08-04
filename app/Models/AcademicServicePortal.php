<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicServicePortal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sistem', 'alamat_url', 'deskripsi', 'fungsi', 'icon', 'urutan', 'status',
    ];
}