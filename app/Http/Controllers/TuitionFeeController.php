<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TuitionFee;
use Illuminate\Http\Request;

class TuitionFeeController extends Controller
{
    public function index(Request $request)
    {
        $tuitionFees = TuitionFee::with('departement')
            ->when($request->tahun_akademik, fn ($q) => $q->where('tahun_akademik', $request->tahun_akademik))
            ->when($request->id_departement, fn ($q) => $q->where('id_departement', $request->id_departement))
            ->when($request->jenjang, fn ($q) => $q->where('jenjang', $request->jenjang))
            ->when($request->jenis_program, fn ($q) => $q->where('jenis_program', $request->jenis_program))
            ->orderByDesc('tahun_akademik')
            ->get();

        return view('tuition_fee.index', compact('tuitionFees'));
    }

    public function create()
    {
        return view('tuition_fee.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_akademik' => 'required|string|max:20',
            'id_departement' => 'required|exists:departements,id',
            'jenjang' => 'required|in:S1,S2',
            'jenis_program' => 'required|in:reguler,hybrid,pjj,fast_track',
            'semester' => 'nullable|integer|min:1|max:14',
            'jenis_biaya' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        TuitionFee::create($validated);

        return redirect()->route('tuition-fees.index')
            ->with('success', 'Rincian biaya berhasil ditambahkan.');
    }

    public function edit(TuitionFee $tuitionFee)
    {
        return view('tuition_fee.edit', compact('tuitionFee'));
    }

    public function update(Request $request, TuitionFee $tuitionFee)
    {
        $validated = $request->validate([
            'tahun_akademik' => 'required|string|max:20',
            'id_departement' => 'required|exists:departements,id',
            'jenjang' => 'required|in:S1,S2',
            'jenis_program' => 'required|in:reguler,hybrid,pjj,fast_track',
            'semester' => 'nullable|integer|min:1|max:14',
            'jenis_biaya' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $tuitionFee->update($validated);

        return redirect()->route('tuition-fees.index')
            ->with('success', 'Rincian biaya berhasil diperbarui.');
    }

    public function destroy(TuitionFee $tuitionFee)
    {
        $tuitionFee->delete();

        return redirect()->route('tuition-fees.index')
            ->with('success', 'Rincian biaya berhasil dihapus.');
    }
}