<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InternshipController extends Controller
{
    public function index()
    {
        $internships = Internship::orderByDesc('batas_pendaftaran')->get();

        return view('internship.index', compact('internships'));
    }

    public function create()
    {
        return view('internship.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lowongan' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'batas_pendaftaran' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'durasi' => 'required|string|max:100',
            'prodi_relevan' => 'nullable|string',
            'poster' => 'nullable|mimes:jpg,jpeg,png,webp,pdf|max:2048',
            'tautan_pendaftaran' => 'nullable|url',
            'status' => 'required|in:aktif,ditutup',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('internship-poster', 'public');
        }

        Internship::create($validated);

        return redirect()->route('internships.index')
            ->with('success', 'Informasi magang berhasil ditambahkan.');
    }

    public function edit(Internship $internship)
    {
        return view('internship.edit', compact('internship'));
    }

    public function update(Request $request, Internship $internship)
    {
        $validated = $request->validate([
            'nama_lowongan' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'persyaratan' => 'required|string',
            'batas_pendaftaran' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'durasi' => 'required|string|max:100',
            'prodi_relevan' => 'nullable|string',
            'poster' => 'nullable|mimes:jpg,jpeg,png,webp,pdf|max:2048',
            'tautan_pendaftaran' => 'nullable|url',
            'status' => 'required|in:aktif,ditutup',
        ]);

        if ($request->hasFile('poster')) {
            if ($internship->poster && Storage::disk('public')->exists($internship->poster)) {
                Storage::disk('public')->delete($internship->poster);
            }
            $validated['poster'] = $request->file('poster')->store('internship-poster', 'public');
        }

        $internship->update($validated);

        return redirect()->route('internships.index')
            ->with('success', 'Informasi magang berhasil diperbarui.');
    }

    public function destroy(Internship $internship)
    {
        if ($internship->poster && Storage::disk('public')->exists($internship->poster)) {
            Storage::disk('public')->delete($internship->poster);
        }
        $internship->delete();

        return redirect()->route('internships.index')
            ->with('success', 'Informasi magang berhasil dihapus.');
    }
}