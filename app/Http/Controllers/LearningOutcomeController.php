<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\LearningOutcome;
use Illuminate\Http\Request;

class LearningOutcomeController extends Controller
{
    // Nested di bawah departemen. RestrictDepartementAccess middleware
    // membatasi admin prodi hanya bisa mengelola id_departement miliknya.

    public function index(Departement $departement)
    {
        $learningOutcomes = LearningOutcome::where('id_departement', $departement->id)
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->get();

        return view('learning_outcome.index', compact('departement', 'learningOutcomes'));
    }

    public function create(Departement $departement)
    {
        return view('learning_outcome.create', compact('departement'));
    }

    public function store(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'kode_cpl' => 'required|string|max:255',
            'kategori' => 'required|in:sikap,pengetahuan,keterampilan_umum,keterampilan_khusus',
            'pernyataan' => 'required|string',
            'urutan' => 'nullable|integer',
        ]);
        $validated['id_departement'] = $departement->id;

        LearningOutcome::create($validated);

        return redirect()->route('learning-outcomes.index', $departement->id)
            ->with('success', 'CPL berhasil ditambahkan.');
    }

    public function edit(Departement $departement, LearningOutcome $learningOutcome)
    {
        return view('learning_outcome.edit', compact('departement', 'learningOutcome'));
    }

    public function update(Request $request, Departement $departement, LearningOutcome $learningOutcome)
    {
        $validated = $request->validate([
            'kode_cpl' => 'required|string|max:255',
            'kategori' => 'required|in:sikap,pengetahuan,keterampilan_umum,keterampilan_khusus',
            'pernyataan' => 'required|string',
            'urutan' => 'nullable|integer',
        ]);

        $learningOutcome->update($validated);

        return redirect()->route('learning-outcomes.index', $departement->id)
            ->with('success', 'CPL berhasil diperbarui.');
    }

    public function destroy(Departement $departement, LearningOutcome $learningOutcome)
    {
        $learningOutcome->delete();

        return redirect()->route('learning-outcomes.index', $departement->id)
            ->with('success', 'CPL berhasil dihapus.');
    }
}