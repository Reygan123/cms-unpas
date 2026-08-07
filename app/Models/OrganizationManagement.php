<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationManagement extends Model
{
    use HasFactory;

    protected $table = 'organization_managements';

    protected $fillable = [
        'id_student_organization', 'nama', 'jabatan', 'nama_bidang', 'foto', 'periode_kepengurusan', 'urutan',
    ];

    public function studentOrganization()
    {
        return $this->belongsTo(StudentOrganization::class, 'id_student_organization');
    }
}