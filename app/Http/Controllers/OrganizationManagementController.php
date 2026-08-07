<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrganizationManagement;
use App\Models\StudentOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationManagementController extends Controller
{
    public function index(StudentOrganization $studentOrganization)
    {
        $managements = $studentOrganization->managements()->orderBy('urutan')->get();

        return view('organization_management.index', compact('studentOrganization', 'managements'));
    }

    public function create(StudentOrganization $studentOrganization)
    {
        return view('organization_management.create', compact('studentOrganization'));
    }

    public function store(Request $request, StudentOrganization $studentOrganization)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:ketua,wakil_ketua,sekretaris,bendahara,kepala_bidang',
            'nama_bidang' => 'nullable|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'periode_kepengurusan' => 'required|string|max:100',
            'urutan' => 'nullable|integer',
        ]);
        $validated['id_student_organization'] = $studentOrganization->id;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('organization-management-photo', 'public');
        }

        OrganizationManagement::create($validated);

        return redirect()->route('student-organizations.organization-managements.index', $studentOrganization->id)
            ->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function edit(StudentOrganization $studentOrganization, OrganizationManagement $organizationManagement)
    {
        return view('organization_management.edit', compact('studentOrganization', 'organizationManagement'));
    }

    public function update(Request $request, StudentOrganization $studentOrganization, OrganizationManagement $organizationManagement)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:ketua,wakil_ketua,sekretaris,bendahara,kepala_bidang',
            'nama_bidang' => 'nullable|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'periode_kepengurusan' => 'required|string|max:100',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($organizationManagement->foto && Storage::disk('public')->exists($organizationManagement->foto)) {
                Storage::disk('public')->delete($organizationManagement->foto);
            }
            $validated['foto'] = $request->file('foto')->store('organization-management-photo', 'public');
        }

        $organizationManagement->update($validated);

        return redirect()->route('student-organizations.organization-managements.index', $studentOrganization->id)
            ->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(StudentOrganization $studentOrganization, OrganizationManagement $organizationManagement)
    {
        if ($organizationManagement->foto && Storage::disk('public')->exists($organizationManagement->foto)) {
            Storage::disk('public')->delete($organizationManagement->foto);
        }
        $organizationManagement->delete();

        return redirect()->route('student-organizations.organization-managements.index', $studentOrganization->id)
            ->with('success', 'Pengurus berhasil dihapus.');
    }
}