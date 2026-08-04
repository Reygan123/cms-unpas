<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademicDocumentController extends Controller
{
    public function index(Request $request)
    {
        $documents = AcademicDocument::with('departement')
            ->when($request->kategori, fn ($q) => $q->where('kategori', $request->kategori))
            ->when($request->sub_kategori, fn ($q) => $q->where('sub_kategori', $request->sub_kategori))
            ->when($request->status, fn ($q) => $q->where('status', $request->status))
            ->when($request->search, fn ($q) => $q->where('judul', 'like', '%'.$request->search.'%'))
            ->orderByDesc('tanggal_terbit')
            ->paginate(10);

        return view('academic_document.index', compact('documents'));
    }

    public function create()
    {
        $departements = Departement::orderBy('name')->get();

        return view('academic_document.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:buku_panduan,peraturan',
            'sub_kategori' => 'nullable|in:skripsi_ta,kp_magang,mbkm,perkuliahan_evaluasi,kemajuan_studi,yudisium_kelulusan',
            'nomor_dokumen' => 'nullable|string|max:100',
            'tahun_akademik' => 'nullable|string|max:20',
            'tanggal_terbit' => 'nullable|date',
            'tanggal_berlaku' => 'nullable|date',
            'status' => 'required|in:berlaku,direvisi,dicabut,arsip',
            'id_departement' => 'nullable|exists:departements,id',
            'file' => 'required|mimes:pdf|max:5120',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['file'] = $request->file('file')->store('academic-documents', 'public');

        AcademicDocument::create($validated);

        return redirect()->route('academic-documents.index')
            ->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function edit(AcademicDocument $academicDocument)
    {
        $departements = Departement::orderBy('name')->get();

        return view('academic_document.edit', compact('academicDocument', 'departements'));
    }

    public function update(Request $request, AcademicDocument $academicDocument)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:buku_panduan,peraturan',
            'sub_kategori' => 'nullable|in:skripsi_ta,kp_magang,mbkm,perkuliahan_evaluasi,kemajuan_studi,yudisium_kelulusan',
            'nomor_dokumen' => 'nullable|string|max:100',
            'tahun_akademik' => 'nullable|string|max:20',
            'tanggal_terbit' => 'nullable|date',
            'tanggal_berlaku' => 'nullable|date',
            'status' => 'required|in:berlaku,direvisi,dicabut,arsip',
            'id_departement' => 'nullable|exists:departements,id',
            'file' => 'nullable|mimes:pdf|max:5120',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('file')) {
            if ($academicDocument->file && Storage::disk('public')->exists($academicDocument->file)) {
                Storage::disk('public')->delete($academicDocument->file);
            }
            $validated['file'] = $request->file('file')->store('academic-documents', 'public');
        }

        $academicDocument->update($validated);

        return redirect()->route('academic-documents.index')
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy(AcademicDocument $academicDocument)
    {
        if ($academicDocument->file && Storage::disk('public')->exists($academicDocument->file)) {
            Storage::disk('public')->delete($academicDocument->file);
        }
        $academicDocument->delete();

        return redirect()->route('academic-documents.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }
}