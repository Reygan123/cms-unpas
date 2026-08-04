<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\TracerStudy;
use Illuminate\Http\Request;

class TracerStudyController extends Controller
{
    public function index(Departement $departement)
    {
        $tracerStudies = TracerStudy::where('id_departement', $departement->id)
            ->orderByDesc('tahun')
            ->orderBy('label')
            ->get()
            ->groupBy('tahun');

        return view('tracer_study.index', compact('departement', 'tracerStudies'));
    }

    public function create(Departement $departement)
    {
        return view('tracer_study.create', compact('departement'));
    }

    public function store(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'tahun' => 'required|digits:4',
            'label' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'satuan' => 'nullable|string|max:20',
        ]);
        $validated['id_departement'] = $departement->id;

        TracerStudy::create($validated);

        return redirect()->route('tracer-studies.index', $departement->id)
            ->with('success', 'Data tracer study berhasil ditambahkan.');
    }

    public function edit(Departement $departement, TracerStudy $tracerStudy)
    {
        return view('tracer_study.edit', compact('departement', 'tracerStudy'));
    }

    public function update(Request $request, Departement $departement, TracerStudy $tracerStudy)
    {
        $validated = $request->validate([
            'tahun' => 'required|digits:4',
            'label' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'satuan' => 'nullable|string|max:20',
        ]);

        $tracerStudy->update($validated);

        return redirect()->route('tracer-studies.index', $departement->id)
            ->with('success', 'Data tracer study berhasil diperbarui.');
    }

    public function destroy(Departement $departement, TracerStudy $tracerStudy)
    {
        $tracerStudy->delete();

        return redirect()->route('tracer-studies.index', $departement->id)
            ->with('success', 'Data tracer study berhasil dihapus.');
    }
}