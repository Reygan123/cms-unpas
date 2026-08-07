<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\PengabdianMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengabdianMasyarakatController extends Controller
{
    public function index()
    {
        $pengabdianMasyarakats = PengabdianMasyarakat::with('departements')
            ->orderByDesc('tanggal')
            ->get();

        return view('pengabdian_masyarakat.index', compact('pengabdianMasyarakats'));
    }

    public function create()
    {
        $departements = Departement::orderBy('name')->get();

        return view('pengabdian_masyarakat.create', compact('departements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar_upload' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_url' => 'nullable|url',
            'dosen_penanggung_jawab' => 'nullable|array',
            'dosen_penanggung_jawab.*' => 'nullable|string|max:255',
            'sumber' => 'nullable|url',
            'status' => 'required|in:published,draft',
            'departement_ids' => 'nullable|array',
            'departement_ids.*' => 'exists:departements,id',
        ]);

        $validated['slug'] = Str::slug($validated['judul']).'-'.time();

        $validated['dosen_penanggung_jawab'] = array_values(array_filter(
            $request->input('dosen_penanggung_jawab', [])
        ));

        if ($request->hasFile('gambar_upload')) {
            $validated['gambar'] = $request->file('gambar_upload')->store('pengabdian-image', 'public');
        } elseif ($request->filled('gambar_url')) {
            $validated['gambar'] = $request->input('gambar_url');
        }

        $departementIds = $validated['departement_ids'] ?? [];
        unset($validated['gambar_upload'], $validated['gambar_url'], $validated['departement_ids']);

        $pengabdianMasyarakat = PengabdianMasyarakat::create($validated);
        $pengabdianMasyarakat->departements()->sync($departementIds);

        return redirect()->route('pengabdian.index')
            ->with('success', 'Data pengabdian masyarakat berhasil ditambahkan.');
    }

    public function edit(PengabdianMasyarakat $pengabdian)
    {
        $departements = Departement::orderBy('name')->get();
        $pengabdian->load('departements');

        return view('pengabdian_masyarakat.edit', compact('pengabdian', 'departements'));
    }

    public function update(Request $request, PengabdianMasyarakat $pengabdian)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar_upload' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_url' => 'nullable|url',
            'dosen_penanggung_jawab' => 'nullable|array',
            'dosen_penanggung_jawab.*' => 'nullable|string|max:255',
            'sumber' => 'nullable|url',
            'status' => 'required|in:published,draft',
            'departement_ids' => 'nullable|array',
            'departement_ids.*' => 'exists:departements,id',
        ]);

        $validated['dosen_penanggung_jawab'] = array_values(array_filter(
            $request->input('dosen_penanggung_jawab', [])
        ));

        if ($request->hasFile('gambar_upload')) {
            if ($pengabdian->gambar && Storage::disk('public')->exists($pengabdian->gambar)) {
                Storage::disk('public')->delete($pengabdian->gambar);
            }
            $validated['gambar'] = $request->file('gambar_upload')->store('pengabdian-image', 'public');
        } elseif ($request->filled('gambar_url')) {
            $validated['gambar'] = $request->input('gambar_url');
        }

        $departementIds = $validated['departement_ids'] ?? [];
        unset($validated['gambar_upload'], $validated['gambar_url'], $validated['departement_ids']);

        $pengabdian->update($validated);
        $pengabdian->departements()->sync($departementIds);

        return redirect()->route('pengabdian.index')
            ->with('success', 'Data pengabdian masyarakat berhasil diperbarui.');
    }

    public function destroy(PengabdianMasyarakat $pengabdian)
    {
        if ($pengabdian->gambar && ! Str::startsWith($pengabdian->gambar, ['http://', 'https://'])
            && Storage::disk('public')->exists($pengabdian->gambar)) {
            Storage::disk('public')->delete($pengabdian->gambar);
        }
        $pengabdian->delete();

        return redirect()->route('pengabdian.index')
            ->with('success', 'Data pengabdian masyarakat berhasil dihapus.');
    }
}