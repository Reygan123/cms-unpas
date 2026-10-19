<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupBanner extends Model
{
    use HasFactory;

    protected $table = 'popup_banners';

    protected $fillable = [
        'title',
        'image',
        'link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
