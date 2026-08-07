<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CampusActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CampusActivityController extends Controller
{
    public function index()
    {
        $campusActivities = CampusActivity::orderByDesc('tanggal')->get();

        return view('campus_activity.index', compact('campusActivities'));
    }

    public function create()
    {
        return view('campus_activity.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
            'penyelenggara' => 'nullable|string|max:255',
            'kategori' => 'required|in:kegiatan_kemahasiswaan,lomba_kompetisi,seminar_workshop,olahraga,seni_budaya,suasana_kampus',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
        ]);

        $validated['slug'] = Str::slug($validated['judul']).'-'.time();
        $validated['gambar'] = $request->file('gambar')->store('campus-activity-image', 'public');

        CampusActivity::create($validated);

        return redirect()->route('campus-activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(CampusActivity $campusActivity)
    {
        return view('campus_activity.edit', compact('campusActivity'));
    }

    public function update(Request $request, CampusActivity $campusActivity)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'tanggal' => 'required|date',
            'penyelenggara' => 'nullable|string|max:255',
            'kategori' => 'required|in:kegiatan_kemahasiswaan,pengabdian_masyarakat,lomba_kompetisi,seminar_workshop,olahraga,seni_budaya,suasana_kampus',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            if ($campusActivity->gambar && Storage::disk('public')->exists($campusActivity->gambar)) {
                Storage::disk('public')->delete($campusActivity->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('campus-activity-image', 'public');
        }

        $campusActivity->update($validated);

        return redirect()->route('campus-activities.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(CampusActivity $campusActivity)
    {
        if ($campusActivity->gambar && Storage::disk('public')->exists($campusActivity->gambar)) {
            Storage::disk('public')->delete($campusActivity->gambar);
        }
        $campusActivity->delete();

        return redirect()->route('campus-activities.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}