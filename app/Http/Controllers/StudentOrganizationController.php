<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentOrganizationController extends Controller
{
    public function index()
    {
        $studentOrganizations = StudentOrganization::with('departement')->get();

        return view('student_organization.index', compact('studentOrganizations'));
    }

    public function create()
    {
        return view('student_organization.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:50',
            'id_departement' => 'nullable|exists:departements,id',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'deskripsi_singkat' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'nilai_organisasi' => 'nullable|string',
            'ruang_lingkup' => 'nullable|string',
            'ketua' => 'nullable|string|max:255',
            'periode_kepengurusan' => 'nullable|string|max:100',
            'media_sosial' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['singkatan']);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('organization-logo', 'public');
        }

        StudentOrganization::create($validated);

        return redirect()->route('student-organizations.index')
            ->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function edit(StudentOrganization $studentOrganization)
    {
        return view('student_organization.edit', compact('studentOrganization'));
    }

    public function update(Request $request, StudentOrganization $studentOrganization)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:50',
            'id_departement' => 'nullable|exists:departements,id',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:1024',
            'deskripsi_singkat' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'nilai_organisasi' => 'nullable|string',
            'ruang_lingkup' => 'nullable|string',
            'ketua' => 'nullable|string|max:255',
            'periode_kepengurusan' => 'nullable|string|max:100',
            'media_sosial' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            if ($studentOrganization->logo && Storage::disk('public')->exists($studentOrganization->logo)) {
                Storage::disk('public')->delete($studentOrganization->logo);
            }
            $validated['logo'] = $request->file('logo')->store('organization-logo', 'public');
        }

        $studentOrganization->update($validated);

        return redirect()->route('student-organizations.index')
            ->with('success', 'Organisasi berhasil diperbarui.');
    }

    public function destroy(StudentOrganization $studentOrganization)
    {
        if ($studentOrganization->logo && Storage::disk('public')->exists($studentOrganization->logo)) {
            Storage::disk('public')->delete($studentOrganization->logo);
        }
        $studentOrganization->delete();

        return redirect()->route('student-organizations.index')
            ->with('success', 'Organisasi berhasil dihapus.');
    }
}