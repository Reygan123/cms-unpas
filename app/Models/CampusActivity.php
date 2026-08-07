<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'slug', 'gambar', 'tanggal', 'penyelenggara', 'kategori', 'ringkasan', 'konten',
    ];
}