<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student_organization', 'tipe', 'file', 'caption',
    ];

    public function studentOrganization()
    {
        return $this->belongsTo(StudentOrganization::class, 'id_student_organization');
    }
}