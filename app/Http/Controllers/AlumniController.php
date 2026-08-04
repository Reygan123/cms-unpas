<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlumniController extends Controller
{
    public function index(Departement $departement)
    {
        $alumni = Alumni::where('id_departement', $departement->id)
            ->orderByDesc('tahun_lulus')
            ->get();

        return view('alumni.index', compact('departement', 'alumni'));
    }

    public function create(Departement $departement)
    {
        return view('alumni.create', compact('departement'));
    }

    public function store(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'angkatan' => 'nullable|string|max:20',
            'tahun_lulus' => 'nullable|digits:4',
            'profesi' => 'nullable|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'cerita_sukses' => 'nullable|string',
            'home' => 'nullable|string',
        ]);
        $validated['id_departement'] = $departement->id;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('alumni-photo', 'public');
        }

        Alumni::create($validated);

        return redirect()->route('alumni.index', $departement->id)
            ->with('success', 'Data alumni berhasil ditambahkan.');
    }

    public function edit(Departement $departement, Alumni $alumnus)
    {
        return view('alumni.edit', compact('departement', 'alumnus'));
    }

    public function update(Request $request, Departement $departement, Alumni $alumnus)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'angkatan' => 'nullable|string|max:20',
            'tahun_lulus' => 'nullable|digits:4',
            'profesi' => 'nullable|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'cerita_sukses' => 'nullable|string',
            'home' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
                Storage::disk('public')->delete($alumnus->foto);
            }
            $validated['foto'] = $request->file('foto')->store('alumni-photo', 'public');
        }

        $alumnus->update($validated);

        return redirect()->route('alumni.index', $departement->id)
            ->with('success', 'Data alumni berhasil diperbarui.');
    }

    public function destroy(Departement $departement, Alumni $alumnus)
    {
        if ($alumnus->foto && Storage::disk('public')->exists($alumnus->foto)) {
            Storage::disk('public')->delete($alumnus->foto);
        }
        $alumnus->delete();

        return redirect()->route('alumni.index', $departement->id)
            ->with('success', 'Data alumni berhasil dihapus.');
    }
}