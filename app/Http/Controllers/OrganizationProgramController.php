<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProgram;
use App\Models\StudentOrganization;
use Illuminate\Http\Request;

class OrganizationProgramController extends Controller
{
    public function index(StudentOrganization $studentOrganization)
    {
        $programs = $studentOrganization->programs()->orderByDesc('tanggal_pelaksanaan')->get();

        return view('organization_program.index', compact('studentOrganization', 'programs'));
    }

    public function create(StudentOrganization $studentOrganization)
    {
        return view('organization_program.create', compact('studentOrganization'));
    }

    public function store(Request $request, StudentOrganization $studentOrganization)
    {
        $validated = $request->validate([
            'kategori' => 'required|in:pengembangan_organisasi,kaderisasi,keilmuan_keprofesian,pengabdian_masyarakat,minat_bakat,kesejahteraan_mahasiswa,kewirausahaan,komunikasi_informasi',
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_pelaksanaan' => 'nullable|date',
            'status' => 'required|in:direncanakan,berjalan,selesai',
        ]);
        $validated['id_student_organization'] = $studentOrganization->id;

        OrganizationProgram::create($validated);

        return redirect()->route('student-organizations.organization-programs.index', $studentOrganization->id)
            ->with('success', 'Program kerja berhasil ditambahkan.');
    }

    public function edit(StudentOrganization $studentOrganization, OrganizationProgram $organizationProgram)
    {
        return view('organization_program.edit', compact('studentOrganization', 'organizationProgram'));
    }

    public function update(Request $request, StudentOrganization $studentOrganization, OrganizationProgram $organizationProgram)
    {
        $validated = $request->validate([
            'kategori' => 'required|in:pengembangan_organisasi,kaderisasi,keilmuan_keprofesian,pengabdian_masyarakat,minat_bakat,kesejahteraan_mahasiswa,kewirausahaan,komunikasi_informasi',
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_pelaksanaan' => 'nullable|date',
            'status' => 'required|in:direncanakan,berjalan,selesai',
        ]);

        $organizationProgram->update($validated);

        return redirect()->route('student-organizations.organization-programs.index', $studentOrganization->id)
            ->with('success', 'Program kerja berhasil diperbarui.');
    }

    public function destroy(StudentOrganization $studentOrganization, OrganizationProgram $organizationProgram)
    {
        $organizationProgram->delete();

        return redirect()->route('student-organizations.organization-programs.index', $studentOrganization->id)
            ->with('success', 'Program kerja berhasil dihapus.');
    }
}