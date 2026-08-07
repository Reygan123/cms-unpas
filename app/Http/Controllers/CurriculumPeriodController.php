<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CurriculumPeriod;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CurriculumPeriodController extends Controller
{
    public function index(Departement $departement)
    {
        $curriculumPeriods = CurriculumPeriod::where('id_departement', $departement->id)
            ->withCount('courses')
            ->orderByDesc('tahun_kurikulum')
            ->get();

        return view('curriculum_period.index', compact('departement', 'curriculumPeriods'));
    }

    public function create(Departement $departement)
    {
        return view('curriculum_period.create', compact('departement'));
    }

    public function store(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'tahun_kurikulum' => 'required|string|max:20',
            'jumlah_semester' => 'required|integer|min:1|max:14',
            'total_sks' => 'nullable|integer',
            'program_kampus_berdampak' => 'nullable|string',
            'dokumen_file' => 'nullable|mimes:pdf|max:5120',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        $validated['id_departement'] = $departement->id;

        if ($request->hasFile('dokumen_file')) {
            $validated['dokumen_file'] = $request->file('dokumen_file')
                ->store('curriculum-documents', 'public');
        }

        // Hanya boleh ada satu periode kurikulum aktif per prodi.
        if ($validated['status'] === 'aktif') {
            CurriculumPeriod::where('id_departement', $departement->id)->update(['status' => 'nonaktif']);
        }

        CurriculumPeriod::create($validated);

        return redirect()->route('departement.curriculum-periods.index', $departement->id)
            ->with('success', 'Periode kurikulum berhasil ditambahkan.');
    }

    public function edit(Departement $departement, CurriculumPeriod $curriculumPeriod)
    {
        return view('curriculum_period.edit', compact('departement', 'curriculumPeriod'));
    }

    public function update(Request $request, Departement $departement, CurriculumPeriod $curriculumPeriod)
    {
        $validated = $request->validate([
            'tahun_kurikulum' => 'required|string|max:20',
            'jumlah_semester' => 'required|integer|min:1|max:14',
            'total_sks' => 'nullable|integer',
            'program_kampus_berdampak' => 'nullable|string',
            'dokumen_file' => 'nullable|mimes:pdf|max:5120',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('dokumen_file')) {
            if ($curriculumPeriod->dokumen_file && Storage::disk('public')->exists($curriculumPeriod->dokumen_file)) {
                Storage::disk('public')->delete($curriculumPeriod->dokumen_file);
            }
            $validated['dokumen_file'] = $request->file('dokumen_file')
                ->store('curriculum-documents', 'public');
        }

        if ($validated['status'] === 'aktif') {
            CurriculumPeriod::where('id_departement', $departement->id)
                ->where('id', '!=', $curriculumPeriod->id)
                ->update(['status' => 'nonaktif']);
        }

        $curriculumPeriod->update($validated);

        return redirect()->route('departement.curriculum-periods.index', $departement->id)
            ->with('success', 'Periode kurikulum berhasil diperbarui.');
    }

    public function destroy(Departement $departement, CurriculumPeriod $curriculumPeriod)
    {
        if ($curriculumPeriod->dokumen_file && Storage::disk('public')->exists($curriculumPeriod->dokumen_file)) {
            Storage::disk('public')->delete($curriculumPeriod->dokumen_file);
        }
        $curriculumPeriod->delete(); // courses ikut terhapus via cascadeOnDelete di migration

        return redirect()->route('departement.curriculum-periods.index', $departement->id)
            ->with('success', 'Periode kurikulum berhasil dihapus.');
    }
}