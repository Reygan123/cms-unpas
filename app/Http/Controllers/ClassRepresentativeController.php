<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassRepresentative;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassRepresentativeController extends Controller
{
    public function index()
    {
        $classRepresentatives = ClassRepresentative::with('departement')
            ->orderByDesc('angkatan')
            ->get();

        return view('class_representative.index', compact('classRepresentatives'));
    }

    public function create()
    {
        $departements = Departement::all();

        return view('class_representative.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'angkatan' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:ketua_angkatan,pic_aktivis',
            'id_departement' => 'nullable|exists:departements,id',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'kontak' => 'nullable|string|max:255',
            'status_on_duty' => 'boolean',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('class-representative-photo', 'public');
        }

        ClassRepresentative::create($validated);

        return redirect()->route('class-representatives.index')
            ->with('success', 'Data tokoh angkatan berhasil ditambahkan.');
    }

    public function edit(ClassRepresentative $classRepresentative)
    {
        $departements = Departement::all();

        return view('class_representative.edit', compact('classRepresentative', 'departements'));
    }

    public function update(Request $request, ClassRepresentative $classRepresentative)
    {
        $validated = $request->validate([
            'angkatan' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:ketua_angkatan,pic_aktivis',
            'id_departement' => 'nullable|exists:departements,id',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'kontak' => 'nullable|string|max:255',
            'status_on_duty' => 'boolean',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($classRepresentative->foto && Storage::disk('public')->exists($classRepresentative->foto)) {
                Storage::disk('public')->delete($classRepresentative->foto);
            }
            $validated['foto'] = $request->file('foto')->store('class-representative-photo', 'public');
        }

        $classRepresentative->update($validated);

        return redirect()->route('class-representatives.index')
            ->with('success', 'Data tokoh angkatan berhasil diperbarui.');
    }

    public function destroy(ClassRepresentative $classRepresentative)
    {
        if ($classRepresentative->foto && Storage::disk('public')->exists($classRepresentative->foto)) {
            Storage::disk('public')->delete($classRepresentative->foto);
        }
        $classRepresentative->delete();

        return redirect()->route('class-representatives.index')
            ->with('success', 'Data tokoh angkatan berhasil dihapus.');
    }
}