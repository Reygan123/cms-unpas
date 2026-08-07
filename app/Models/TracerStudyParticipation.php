<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudyParticipation extends Model
{
    use HasFactory;

    protected $fillable = [
        'angkatan', 'tahun', 'id_departement', 'jumlah_target', 'jumlah_mengisi',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }

    public function getPersentaseAttribute()
    {
        if (! $this->jumlah_target) {
            return 0;
        }

        return round(($this->jumlah_mengisi / $this->jumlah_target) * 100, 2);
    }
}