<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student_organization', 'kategori', 'nama_program', 'deskripsi', 'tanggal_pelaksanaan', 'status',
    ];

    public function studentOrganization()
    {
        return $this->belongsTo(StudentOrganization::class, 'id_student_organization');
    }
}