<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan', 'tanggal', 'waktu', 'tempat', 'jenis', 'deskripsi', 'poster', 'tautan_pendaftaran',
    ];
}