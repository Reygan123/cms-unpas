<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TracerStudyParticipation;
use Illuminate\Http\Request;

class TracerStudyParticipationController extends Controller
{
    public function index()
    {
        $tracerStudyParticipations = TracerStudyParticipation::with('departement')
            ->orderByDesc('tahun')
            ->get();

        return view('tracer_study_participation.index', compact('tracerStudyParticipations'));
    }

    public function create()
    {
        return view('tracer_study_participation.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'angkatan' => 'required|string|max:20',
            'tahun' => 'required|digits:4',
            'id_departement' => 'nullable|exists:departements,id',
            'jumlah_target' => 'required|integer|min:0',
            'jumlah_mengisi' => 'required|integer|min:0',
        ]);

        TracerStudyParticipation::create($validated);

        return redirect()->route('tracer-study-participations.index')
            ->with('success', 'Data partisipasi berhasil ditambahkan.');
    }

    public function edit(TracerStudyParticipation $tracerStudyParticipation)
    {
        return view('tracer_study_participation.edit', compact('tracerStudyParticipation'));
    }

    public function update(Request $request, TracerStudyParticipation $tracerStudyParticipation)
    {
        $validated = $request->validate([
            'angkatan' => 'required|string|max:20',
            'tahun' => 'required|digits:4',
            'id_departement' => 'nullable|exists:departements,id',
            'jumlah_target' => 'required|integer|min:0',
            'jumlah_mengisi' => 'required|integer|min:0',
        ]);

        $tracerStudyParticipation->update($validated);

        return redirect()->route('tracer-study-participations.index')
            ->with('success', 'Data partisipasi berhasil diperbarui.');
    }

    public function destroy(TracerStudyParticipation $tracerStudyParticipation)
    {
        $tracerStudyParticipation->delete();

        return redirect()->route('tracer-study-participations.index')
            ->with('success', 'Data partisipasi berhasil dihapus.');
    }
}