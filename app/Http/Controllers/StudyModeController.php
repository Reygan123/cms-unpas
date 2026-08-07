<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudyMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudyModeController extends Controller
{
    // 4 data tetap (reguler/hybrid/pjj/fast-track) — di-seed sekali, admin hanya edit konten.

    public function index()
    {
        $studyModes = StudyMode::orderBy('urutan')->get();

        return view('study_mode.index', compact('studyModes'));
    }

    public function create()
    {
        return view('study_mode.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'karakteristik' => 'nullable|string',
            'bentuk_pembelajaran' => 'nullable|string',
            'keunggulan' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'kebutuhan_mahasiswa' => 'nullable|string',
            'mekanisme' => 'nullable|string',
            'hasil_pendidikan' => 'nullable|string|max:255',
            'durasi' => 'nullable|string|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['nama']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('study-mode-image', 'public');
        }

        StudyMode::create($validated);

        return redirect()->route('study-modes.index')
            ->with('success', 'Program perkuliahan berhasil ditambahkan.');
    }

    public function edit(StudyMode $studyMode)
    {
        return view('study_mode.edit', compact('studyMode'));
    }

    public function update(Request $request, StudyMode $studyMode)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'ringkasan' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'karakteristik' => 'nullable|string',
            'bentuk_pembelajaran' => 'nullable|string',
            'keunggulan' => 'nullable|string',
            'persyaratan' => 'nullable|string',
            'kebutuhan_mahasiswa' => 'nullable|string',
            'mekanisme' => 'nullable|string',
            'hasil_pendidikan' => 'nullable|string|max:255',
            'durasi' => 'nullable|string|max:100',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($studyMode->image && Storage::disk('public')->exists($studyMode->image)) {
                Storage::disk('public')->delete($studyMode->image);
            }
            $validated['image'] = $request->file('image')->store('study-mode-image', 'public');
        }

        $studyMode->update($validated);

        return redirect()->route('study-modes.index')
            ->with('success', 'Program perkuliahan berhasil diperbarui.');
    }
}
