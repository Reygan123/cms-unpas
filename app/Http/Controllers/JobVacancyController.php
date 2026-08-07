<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobVacancy;
use Illuminate\Http\Request;

class JobVacancyController extends Controller
{
    public function index()
    {
        $jobVacancies = JobVacancy::orderByDesc('batas_lamaran')->get();

        return view('job_vacancy.index', compact('jobVacancies'));
    }

    public function create()
    {
        return view('job_vacancy.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'posisi' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:100',
            'persyaratan' => 'required|string',
            'batas_lamaran' => 'required|date',
            'prodi_relevan' => 'nullable|string',
            'tautan_pendaftaran' => 'required|url',
            'status' => 'required|in:aktif,ditutup',
        ]);

        JobVacancy::create($validated);

        return redirect()->route('job-vacancies.index')
            ->with('success', 'Lowongan kerja berhasil ditambahkan.');
    }

    public function edit(JobVacancy $jobVacancy)
    {
        return view('job_vacancy.edit', compact('jobVacancy'));
    }

    public function update(Request $request, JobVacancy $jobVacancy)
    {
        $validated = $request->validate([
            'posisi' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:100',
            'persyaratan' => 'required|string',
            'batas_lamaran' => 'required|date',
            'prodi_relevan' => 'nullable|string',
            'tautan_pendaftaran' => 'required|url',
            'status' => 'required|in:aktif,ditutup',
        ]);

        $jobVacancy->update($validated);

        return redirect()->route('job-vacancies.index')
            ->with('success', 'Lowongan kerja berhasil diperbarui.');
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->delete();

        return redirect()->route('job-vacancies.index')
            ->with('success', 'Lowongan kerja berhasil dihapus.');
    }
}