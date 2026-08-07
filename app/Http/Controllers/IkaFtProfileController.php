<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IkaFtProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IkaFtProfileController extends Controller
{
    public function index()
    {
        $data = IkaFtProfile::first();

        return view('ika_ft_profile.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|string',
            'struktur_pengurus' => 'nullable|string',
            'kontak' => 'nullable|string',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('ika-ft-logo', 'public');
        }

        IkaFtProfile::create($validated);

        return redirect()->route('ika-ft-profile.index')
            ->with('success', 'Profil IKA FT berhasil disimpan.');
    }

    public function update(Request $request, IkaFtProfile $ikaFtProfile)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|string',
            'struktur_pengurus' => 'nullable|string',
            'kontak' => 'nullable|string',
            'logo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            if ($ikaFtProfile->logo && Storage::disk('public')->exists($ikaFtProfile->logo)) {
                Storage::disk('public')->delete($ikaFtProfile->logo);
            }
            $validated['logo'] = $request->file('logo')->store('ika-ft-logo', 'public');
        }

        $ikaFtProfile->update($validated);

        return redirect()->route('ika-ft-profile.index')
            ->with('success', 'Profil IKA FT berhasil diperbarui.');
    }
}