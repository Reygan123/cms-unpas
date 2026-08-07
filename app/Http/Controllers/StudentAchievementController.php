<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentAchievementController extends Controller
{
    public function index(Request $request)
    {
        $studentAchievements = StudentAchievement::with('departement')
            ->when($request->status, fn ($q) => $q->where('status', $request->status), fn ($q) => $q->where('status', 'pending'))
            ->orderByDesc('created_at')
            ->get();

        return view('student_achievement.index', compact('studentAchievements'));
    }

    public function create()
    {
        return view('student_achievement.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'id_departement' => 'nullable|exists:departements,id',
            'nama_kompetisi' => 'required|string|max:255',
            'kategori' => 'required|in:akademik,nonakademik,penelitian,inovasi,pkm,kewirausahaan,debat,seni_budaya,olahraga,pengabdian_masyarakat',
            'tingkat' => 'required|in:program_studi,fakultas,universitas,regional,nasional,internasional',
            'peringkat' => 'nullable|string|max:255',
            'tahun' => 'required|digits:4',
            'dosen_pembimbing' => 'nullable|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'dokumen_pendukung' => 'nullable|mimes:pdf|max:5120',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:pending,verified,rejected',
        ]);

        foreach (['foto', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('student-achievement', 'public');
            }
        }

        if ($validated['status'] === 'verified') {
            $validated['verified_at'] = now();
        }

        StudentAchievement::create($validated);

        return redirect()->route('student-achievements.index')
            ->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    public function edit(StudentAchievement $studentAchievement)
    {
        return view('student_achievement.edit', compact('studentAchievement'));
    }

    public function update(Request $request, StudentAchievement $studentAchievement)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'id_departement' => 'nullable|exists:departements,id',
            'nama_kompetisi' => 'required|string|max:255',
            'kategori' => 'required|in:akademik,nonakademik,penelitian,inovasi,pkm,kewirausahaan,debat,seni_budaya,olahraga,pengabdian_masyarakat',
            'tingkat' => 'required|in:program_studi,fakultas,universitas,regional,nasional,internasional',
            'peringkat' => 'nullable|string|max:255',
            'tahun' => 'required|digits:4',
            'dosen_pembimbing' => 'nullable|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'foto' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'dokumen_pendukung' => 'nullable|mimes:pdf|max:5120',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:pending,verified,rejected',
        ]);

        foreach (['foto', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                if ($studentAchievement->$field && Storage::disk('public')->exists($studentAchievement->$field)) {
                    Storage::disk('public')->delete($studentAchievement->$field);
                }
                $validated[$field] = $request->file($field)->store('student-achievement', 'public');
            }
        }

        if ($validated['status'] === 'verified' && $studentAchievement->status !== 'verified') {
            $validated['verified_at'] = now();
        }

        $studentAchievement->update($validated);

        return redirect()->route('student-achievements.index')
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    public function destroy(StudentAchievement $studentAchievement)
    {
        foreach (['foto', 'dokumen_pendukung'] as $field) {
            if ($studentAchievement->$field && Storage::disk('public')->exists($studentAchievement->$field)) {
                Storage::disk('public')->delete($studentAchievement->$field);
            }
        }
        $studentAchievement->delete();

        return redirect()->route('student-achievements.index')
            ->with('success', 'Data prestasi berhasil dihapus.');
    }

    public function verify(StudentAchievement $studentAchievement)
    {
        $studentAchievement->update(['status' => 'verified', 'verified_at' => now()]);

        return back()->with('success', 'Data prestasi berhasil diverifikasi.');
    }

    public function reject(StudentAchievement $studentAchievement)
    {
        $studentAchievement->update(['status' => 'rejected']);

        return back()->with('success', 'Data prestasi ditolak.');
    }
}