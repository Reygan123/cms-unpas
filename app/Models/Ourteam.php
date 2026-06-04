<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ourteam extends Model
{
    use HasFactory;

    protected $table = 'ourteams';

    protected $fillable = [
        'id_departement', 'name', 'title', 'email', 'phone',
        'ig', 'fb', 'tiktok', 'yt', 'image','home',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}
