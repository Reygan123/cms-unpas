<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccreditationController extends Controller
{
    // id_departement nullable = akreditasi tingkat fakultas.

    public function index(Request $request)
    {
        $accreditations = Accreditation::with('departement')
            ->when($request->jenjang, fn ($q) => $q->where('jenjang', $request->jenjang))
            ->when($request->id_departement, fn ($q) => $q->where('id_departement', $request->id_departement))
            ->orderByDesc('tanggal_berlaku')
            ->get();

        return view('accreditation.index', compact('accreditations'));
    }

    public function create()
    {
        return view('accreditation.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'jenjang' => 'nullable|in:S1,S2',
            'lembaga' => 'required|string|max:255',
            'status' => 'required|string|max:100',
            'nomor_sk' => 'required|string|max:100',
            'tanggal_berlaku' => 'required|date',
            'masa_berlaku_sampai' => 'nullable|date|after:tanggal_berlaku',
            'sertifikat_file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
            'dokumen_pendukung' => 'nullable|mimes:pdf|max:5120',
            'is_public' => 'boolean',
        ]);

        foreach (['sertifikat_file', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('accreditation-documents', 'public');
            }
        }

        Accreditation::create($validated);

        return redirect()->route('accreditations.index')
            ->with('success', 'Data akreditasi berhasil ditambahkan.');
    }

    public function edit(Accreditation $accreditation)
    {
        return view('accreditation.edit', compact('accreditation'));
    }

    public function update(Request $request, Accreditation $accreditation)
    {
        $validated = $request->validate([
            'id_departement' => 'nullable|exists:departements,id',
            'jenjang' => 'nullable|in:S1,S2',
            'lembaga' => 'required|string|max:255',
            'status' => 'required|string|max:100',
            'nomor_sk' => 'required|string|max:100',
            'tanggal_berlaku' => 'required|date',
            'masa_berlaku_sampai' => 'nullable|date|after:tanggal_berlaku',
            'sertifikat_file' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
            'dokumen_pendukung' => 'nullable|mimes:pdf|max:5120',
            'is_public' => 'boolean',
        ]);

        foreach (['sertifikat_file', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                if ($accreditation->$field && Storage::disk('public')->exists($accreditation->$field)) {
                    Storage::disk('public')->delete($accreditation->$field);
                }
                $validated[$field] = $request->file($field)->store('accreditation-documents', 'public');
            }
        }

        $accreditation->update($validated);

        return redirect()->route('accreditations.index')
            ->with('success', 'Data akreditasi berhasil diperbarui.');
    }

    public function destroy(Accreditation $accreditation)
    {
        foreach (['sertifikat_file', 'dokumen_pendukung'] as $field) {
            if ($accreditation->$field && Storage::disk('public')->exists($accreditation->$field)) {
                Storage::disk('public')->delete($accreditation->$field);
            }
        }
        $accreditation->delete();

        return redirect()->route('accreditations.index')
            ->with('success', 'Data akreditasi berhasil dihapus.');
    }
}