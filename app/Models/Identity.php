<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Identity extends Model
{
    use HasFactory;

    protected $table = 'identities';

    protected $fillable = [
        'title', 'meta', 'adress', 'link_map', 'phone',
        'email', 'fb', 'ig', 'tiktok', 'yt', 'time_service', 'image1','day_service', 'image2'
    ];
}
