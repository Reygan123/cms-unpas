<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';


    protected $fillable = [
        'title',
        'slug',
        'start_date',
        'end_date',
        'description',
        'event',
        'location',
        'yt',
        'register_link',
        'contact',
        'category',
        'image',
    ];
}
