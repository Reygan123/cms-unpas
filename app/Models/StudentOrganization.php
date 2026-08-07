<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'singkatan', 'slug', 'id_departement', 'logo', 'deskripsi_singkat',
        'visi', 'misi', 'tujuan', 'nilai_organisasi', 'ruang_lingkup', 'ketua',
        'periode_kepengurusan', 'media_sosial',
    ];

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'id_departement');
    }

    public function managements()
    {
        return $this->hasMany(OrganizationManagement::class, 'id_student_organization');
    }

    public function programs()
    {
        return $this->hasMany(OrganizationProgram::class, 'id_student_organization');
    }

    public function galleries()
    {
        return $this->hasMany(OrganizationGallery::class, 'id_student_organization');
    }

    public function documents()
    {
        return $this->hasMany(OrganizationDocument::class, 'id_student_organization');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'id_student_organization');
    }
}