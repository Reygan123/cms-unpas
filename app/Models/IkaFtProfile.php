<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkaFtProfile extends Model
{
    use HasFactory;

    protected $table = 'ika_ft_profile';

    protected $fillable = [
        'deskripsi', 'struktur_pengurus', 'kontak', 'logo',
    ];
}