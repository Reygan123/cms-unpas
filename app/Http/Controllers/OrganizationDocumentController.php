<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrganizationDocument;
use App\Models\StudentOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationDocumentController extends Controller
{
    public function index(StudentOrganization $studentOrganization)
    {
        $documents = $studentOrganization->documents()->orderByDesc('tahun')->get();

        return view('organization_document.index', compact('studentOrganization', 'documents'));
    }

    public function create(StudentOrganization $studentOrganization)
    {
        return view('organization_document.create', compact('studentOrganization'));
    }

    public function store(Request $request, StudentOrganization $studentOrganization)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:periode_kepengurusan,ad_art,program_kerja,laporan_kegiatan,pedoman_organisasi,kontak',
            'file' => 'required|mimes:pdf|max:5120',
            'tahun' => 'nullable|digits:4',
        ]);
        $validated['id_student_organization'] = $studentOrganization->id;
        $validated['file'] = $request->file('file')->store('organization-document', 'public');

        OrganizationDocument::create($validated);

        return redirect()->route('student-organizations.organization-documents.index', $studentOrganization->id)
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function destroy(StudentOrganization $studentOrganization, OrganizationDocument $organizationDocument)
    {
        if ($organizationDocument->file && Storage::disk('public')->exists($organizationDocument->file)) {
            Storage::disk('public')->delete($organizationDocument->file);
        }
        $organizationDocument->delete();

        return redirect()->route('student-organizations.organization-documents.index', $studentOrganization->id)
            ->with('success', 'Dokumen berhasil dihapus.');
    }
}