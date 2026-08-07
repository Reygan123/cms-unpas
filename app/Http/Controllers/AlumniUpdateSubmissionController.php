<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\AlumniUpdateSubmission;
use Illuminate\Http\Request;

class AlumniUpdateSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $alumniUpdateSubmissions = AlumniUpdateSubmission::with(['alumnus', 'departement'])
            ->when($request->status, fn ($q) => $q->where('status', $request->status), fn ($q) => $q->where('status', 'pending'))
            ->orderByDesc('created_at')
            ->get();

        return view('alumni_update_submission.index', compact('alumniUpdateSubmissions'));
    }

    public function approve(AlumniUpdateSubmission $alumniUpdateSubmission)
    {
        $alumnusData = [
            'nama' => $alumniUpdateSubmission->nama,
            'email' => $alumniUpdateSubmission->email,
            'no_hp' => $alumniUpdateSubmission->no_hp,
            'angkatan' => $alumniUpdateSubmission->angkatan,
            'tahun_lulus' => $alumniUpdateSubmission->tahun_lulus,
            'profesi' => $alumniUpdateSubmission->profesi_terkini,
            'perusahaan' => $alumniUpdateSubmission->perusahaan,
            'alamat' => $alumniUpdateSubmission->alamat,
        ];

        if ($alumniUpdateSubmission->id_alumnus) {
            $alumniUpdateSubmission->alumnus->update($alumnusData);
        } else {
            $alumnusData['id_departement'] = $alumniUpdateSubmission->id_departement;
            $alumnus = Alumni::create($alumnusData);
            $alumniUpdateSubmission->id_alumnus = $alumnus->id;
        }

        $alumniUpdateSubmission->status = 'approved';
        $alumniUpdateSubmission->save();

        return back()->with('success', 'Data alumni berhasil diperbarui.');
    }

    public function destroy(AlumniUpdateSubmission $alumniUpdateSubmission)
    {
        $alumniUpdateSubmission->delete();

        return redirect()->route('alumni-update-submissions.index')
            ->with('success', 'Pengajuan berhasil dihapus.');
    }
}