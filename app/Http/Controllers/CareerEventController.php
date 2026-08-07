<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CareerEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerEventController extends Controller
{
    public function index()
    {
        $careerEvents = CareerEvent::orderByDesc('tanggal')->get();

        return view('career_event.index', compact('careerEvents'));
    }

    public function create()
    {
        return view('career_event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:100',
            'tempat' => 'required|string|max:255',
            'jenis' => 'required|in:seminar_karier,pelatihan_wawancara,personal_branding,simulasi_rekrutmen,pelatihan_soft_skills,pengenalan_profesi',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'tautan_pendaftaran' => 'nullable|url',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('career-event-poster', 'public');
        }

        CareerEvent::create($validated);

        return redirect()->route('career-events.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(CareerEvent $careerEvent)
    {
        return view('career_event.edit', compact('careerEvent'));
    }

    public function update(Request $request, CareerEvent $careerEvent)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|string|max:100',
            'tempat' => 'required|string|max:255',
            'jenis' => 'required|in:seminar_karier,pelatihan_wawancara,personal_branding,simulasi_rekrutmen,pelatihan_soft_skills,pengenalan_profesi',
            'deskripsi' => 'nullable|string',
            'poster' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'tautan_pendaftaran' => 'nullable|url',
        ]);

        if ($request->hasFile('poster')) {
            if ($careerEvent->poster && Storage::disk('public')->exists($careerEvent->poster)) {
                Storage::disk('public')->delete($careerEvent->poster);
            }
            $validated['poster'] = $request->file('poster')->store('career-event-poster', 'public');
        }

        $careerEvent->update($validated);

        return redirect()->route('career-events.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(CareerEvent $careerEvent)
    {
        if ($careerEvent->poster && Storage::disk('public')->exists($careerEvent->poster)) {
            Storage::disk('public')->delete($careerEvent->poster);
        }
        $careerEvent->delete();

        return redirect()->route('career-events.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}