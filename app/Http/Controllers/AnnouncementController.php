<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::when($request->kategori, fn ($q) => $q->where('kategori', $request->kategori))
            ->when($request->search, fn ($q) => $q->where('judul', 'like', '%'.$request->search.'%'))
            ->orderByDesc('is_pinned')
            ->orderByDesc('tanggal_publikasi')
            ->get();

        return view('announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcement.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:perkuliahan,uts_uas,remedial_sisipan,krs,tugas_akhir,yudisium,wisuda,beasiswa,kampus_berdampak,administrasi_akademik',
            'tanggal_publikasi' => 'required|date',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
            'lampiran' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
            'penulis' => 'nullable|string|max:255',
            'is_pinned' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['judul']).'-'.time();

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('announcement-attachments', 'public');
        }

        Announcement::create($validated);

        return redirect()->route('announcements.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Announcement $announcement)
    {
        return view('announcement.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|in:perkuliahan,uts_uas,remedial_sisipan,krs,tugas_akhir,yudisium,wisuda,beasiswa,kampus_berdampak,administrasi_akademik',
            'tanggal_publikasi' => 'required|date',
            'ringkasan' => 'nullable|string',
            'konten' => 'required|string',
            'lampiran' => 'nullable|mimes:pdf,jpg,jpeg,png|max:5120',
            'penulis' => 'nullable|string|max:255',
            'is_pinned' => 'boolean',
        ]);

        if ($request->hasFile('lampiran')) {
            if ($announcement->lampiran && Storage::disk('public')->exists($announcement->lampiran)) {
                Storage::disk('public')->delete($announcement->lampiran);
            }
            $validated['lampiran'] = $request->file('lampiran')->store('announcement-attachments', 'public');
        }

        $announcement->update($validated);

        return redirect()->route('announcements.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Announcement $announcement)
    {
        if ($announcement->lampiran && Storage::disk('public')->exists($announcement->lampiran)) {
            Storage::disk('public')->delete($announcement->lampiran);
        }
        $announcement->delete();

        return redirect()->route('announcements.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function togglePin(Announcement $announcement)
    {
        $announcement->update(['is_pinned' => ! $announcement->is_pinned]);

        return back()->with('success', 'Status pin berhasil diperbarui.');
    }
}