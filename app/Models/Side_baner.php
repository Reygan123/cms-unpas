<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Side_baner extends Model
{
    use HasFactory;

    protected $table = 'side_baners';

    protected $fillable = [
        'id_departement', 'title', 'description', 'image1', 'image2',
        'yt', 'status', 'home',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}
