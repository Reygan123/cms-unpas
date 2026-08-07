<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvReviewRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'id_departement', 'jenis_layanan', 'file_upload',
        'catatan_pemohon', 'status', 'catatan_admin',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }
}