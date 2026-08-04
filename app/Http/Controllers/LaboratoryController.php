<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaboratoryController extends Controller
{
    public function index(Departement $departement)
    {
        $laboratories = Laboratory::where('id_departement', $departement->id)->get();

        return view('laboratory.index', compact('departement', 'laboratories'));
    }

    public function create(Departement $departement)
    {
        return view('laboratory.create', compact('departement'));
    }

    public function store(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kepala_lab' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'home' => 'nullable|string',
        ]);
        $validated['id_departement'] = $departement->id;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('laboratory-image', 'public');
        }

        Laboratory::create($validated);

        return redirect()->route('laboratories.index', $departement->id)
            ->with('success', 'Laboratorium berhasil ditambahkan.');
    }

    public function edit(Departement $departement, Laboratory $laboratory)
    {
        return view('laboratory.edit', compact('departement', 'laboratory'));
    }

    public function update(Request $request, Departement $departement, Laboratory $laboratory)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kepala_lab' => 'nullable|string|max:255',
            'fasilitas' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'home' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($laboratory->image && Storage::disk('public')->exists($laboratory->image)) {
                Storage::disk('public')->delete($laboratory->image);
            }
            $validated['image'] = $request->file('image')->store('laboratory-image', 'public');
        }

        $laboratory->update($validated);

        return redirect()->route('laboratories.index', $departement->id)
            ->with('success', 'Laboratorium berhasil diperbarui.');
    }

    public function destroy(Departement $departement, Laboratory $laboratory)
    {
        if ($laboratory->image && Storage::disk('public')->exists($laboratory->image)) {
            Storage::disk('public')->delete($laboratory->image);
        }
        $laboratory->delete();

        return redirect()->route('laboratories.index', $departement->id)
            ->with('success', 'Laboratorium berhasil dihapus.');
    }
}