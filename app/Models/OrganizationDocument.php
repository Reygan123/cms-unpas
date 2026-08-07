<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student_organization', 'judul', 'kategori', 'file', 'tahun',
    ];

    public function studentOrganization()
    {
        return $this->belongsTo(StudentOrganization::class, 'id_student_organization');
    }
}