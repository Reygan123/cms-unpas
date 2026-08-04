<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'kategori', 'tanggal_publikasi', 'ringkasan',
        'konten', 'lampiran', 'penulis', 'is_pinned',
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date',
        'is_pinned' => 'boolean',
    ];
}