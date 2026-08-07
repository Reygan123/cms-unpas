<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrganizationGallery;
use App\Models\StudentOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationGalleryController extends Controller
{
    public function index(StudentOrganization $studentOrganization)
    {
        $galleries = $studentOrganization->galleries()->latest()->get();

        return view('organization_gallery.index', compact('studentOrganization', 'galleries'));
    }

    public function create(StudentOrganization $studentOrganization)
    {
        return view('organization_gallery.create', compact('studentOrganization'));
    }

    public function store(Request $request, StudentOrganization $studentOrganization)
    {
        $validated = $request->validate([
            'tipe' => 'required|in:foto,video',
            'file' => 'required_if:tipe,foto|nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'url' => 'required_if:tipe,video|nullable|url',
            'caption' => 'nullable|string|max:255',
        ]);
        $validated['id_student_organization'] = $studentOrganization->id;

        $validated['file'] = $validated['tipe'] === 'foto'
            ? $request->file('file')->store('organization-gallery', 'public')
            : $request->input('url');

        unset($validated['url']);

        OrganizationGallery::create($validated);

        return redirect()->route('student-organizations.organization-galleries.index', $studentOrganization->id)
            ->with('success', 'Item galeri berhasil ditambahkan.');
    }

    public function destroy(StudentOrganization $studentOrganization, OrganizationGallery $organizationGallery)
    {
        if ($organizationGallery->tipe === 'foto' && Storage::disk('public')->exists($organizationGallery->file)) {
            Storage::disk('public')->delete($organizationGallery->file);
        }
        $organizationGallery->delete();

        return redirect()->route('student-organizations.organization-galleries.index', $studentOrganization->id)
            ->with('success', 'Item galeri berhasil dihapus.');
    }
}