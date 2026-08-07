<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\AlumniNetworkingResource;
use App\Models\AlumniUpdateSubmission;
use App\Models\CampusActivity;
use App\Models\CareerEvent;
use App\Models\ClassRepresentative;
use App\Models\CvReviewRequest;
use App\Models\Departement;
use App\Models\IkaFtProfile;
use App\Models\Internship;
use App\Models\JobVacancy;
use App\Models\StudentAchievement;
use App\Models\StudentOrganization;
use App\Models\TracerStudyParticipation;
use Illuminate\Http\Request;

class StudentAffairsAPIController extends Controller
{
    public function getCampusActivities(Request $request)
    {
        $data = CampusActivity::when($request->kategori, fn ($q) => $q->where('kategori', $request->kategori))
            ->orderByDesc('tanggal')
            ->get();

        return response()->json($data);
    }

    public function getCampusActivitySlug($slug)
    {
        $data = CampusActivity::where('slug', $slug)->first();
        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getStudentAchievements(Request $request)
    {
        $data = StudentAchievement::with('departement')
            ->where('status', 'verified')
            ->when($request->kategori, fn ($q) => $q->where('kategori', $request->kategori))
            ->when($request->tingkat, fn ($q) => $q->where('tingkat', $request->tingkat))
            ->when($request->tahun, fn ($q) => $q->where('tahun', $request->tahun))
            ->when($request->prodi, fn ($q) => $q->whereHas('departement', function ($query) use ($request) {
                $query->where('slug', $request->prodi);
            }))
            ->orderByDesc('tahun')
            ->get();

        return response()->json($data);
    }

    public function storeStudentAchievement(Request $request)
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
            'submitted_by_name' => 'required|string|max:255',
            'submitted_by_email' => 'required|email|max:255',
        ]);

        foreach (['foto', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('student-achievement', 'public');
            }
        }

        $validated['status'] = 'pending';
        $data = StudentAchievement::create($validated);

        return response()->json($data, 201);
    }

    public function getOrmawaAll()
    {
        $data = StudentOrganization::with('departement')->get();

        return response()->json($data);
    }

    public function getOrmawaSlug($slug)
    {
        $data = StudentOrganization::with('departement')->where('slug', $slug)->first();
        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getOrmawaPengurus($slug)
    {
        $organization = StudentOrganization::where('slug', $slug)->first();
        if (! $organization) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($organization->managements()->orderBy('urutan')->get());
    }

    public function getOrmawaProgramKerja(Request $request, $slug)
    {
        $organization = StudentOrganization::where('slug', $slug)->first();
        if (! $organization) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        $data = $organization->programs()
            ->when($request->kategori, fn ($q) => $q->where('kategori', $request->kategori))
            ->orderByDesc('tanggal_pelaksanaan')
            ->get();

        return response()->json($data);
    }

    public function getOrmawaBerita($slug)
    {
        $organization = StudentOrganization::where('slug', $slug)->first();
        if (! $organization) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($organization->posts()->latest()->get());
    }

    public function getOrmawaGaleri($slug)
    {
        $organization = StudentOrganization::where('slug', $slug)->first();
        if (! $organization) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($organization->galleries()->latest()->get());
    }

    public function getOrmawaDokumen($slug)
    {
        $organization = StudentOrganization::where('slug', $slug)->first();
        if (! $organization) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($organization->documents()->orderByDesc('tahun')->get());
    }

    public function getInternships(Request $request)
    {
        $data = Internship::where('status', 'aktif')
            ->when($request->prodi, fn ($q) => $q->where('prodi_relevan', 'like', '%'.$request->prodi.'%'))
            ->orderByDesc('batas_pendaftaran')
            ->get();

        return response()->json($data);
    }

    public function getJobVacancies(Request $request)
    {
        $data = JobVacancy::where('status', 'aktif')
            ->when($request->prodi, fn ($q) => $q->where('prodi_relevan', 'like', '%'.$request->prodi.'%'))
            ->orderByDesc('batas_lamaran')
            ->get();

        return response()->json($data);
    }

    public function getCareerEvents(Request $request)
    {
        $data = CareerEvent::when($request->jenis, fn ($q) => $q->where('jenis', $request->jenis))
            ->orderByDesc('tanggal')
            ->get();

        return response()->json($data);
    }

    public function storeCvReviewRequest(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'id_departement' => 'nullable|exists:departements,id',
            'jenis_layanan' => 'required|in:cv,portofolio,linkedin,surat_lamaran',
            'file_upload' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'catatan_pemohon' => 'nullable|string',
        ]);

        if ($request->hasFile('file_upload')) {
            $validated['file_upload'] = $request->file('file_upload')->store('cv-review-request', 'public');
        }

        $validated['status'] = 'diajukan';
        $data = CvReviewRequest::create($validated);

        return response()->json($data, 201);
    }

    public function getAlumniNetworking(Request $request)
    {
        $data = AlumniNetworkingResource::when($request->tipe, fn ($q) => $q->where('tipe', $request->tipe))
            ->latest()
            ->get();

        return response()->json($data);
    }

    public function getTracerStudyPartisipasi(Request $request)
    {
        $data = TracerStudyParticipation::with('departement')
            ->when($request->angkatan, fn ($q) => $q->where('angkatan', $request->angkatan))
            ->orderByDesc('tahun')
            ->get();

        return response()->json($data);
    }

    public function getTokangKampus(Request $request)
    {
        $data = ClassRepresentative::with('departement')
            ->when($request->angkatan, fn ($q) => $q->where('angkatan', $request->angkatan))
            ->orderByDesc('angkatan')
            ->get();

        return response()->json($data);
    }

    public function getAlumniAll(Request $request)
    {
        $data = Alumni::with('departement')
            ->when($request->prodi, fn ($q) => $q->whereHas('departement', function ($query) use ($request) {
                $query->where('slug', $request->prodi);
            }))
            ->when($request->angkatan, fn ($q) => $q->where('angkatan', $request->angkatan))
            ->when($request->tahun_lulus, fn ($q) => $q->where('tahun_lulus', $request->tahun_lulus))
            ->when($request->search, fn ($q) => $q->where('nama', 'like', '%'.$request->search.'%'))
            ->orderByDesc('tahun_lulus')
            ->get();

        return response()->json($data);
    }

    public function getIkaFt()
    {
        $data = IkaFtProfile::first();
        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function storeAlumniUpdate(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'prodi' => 'nullable|exists:departements,slug',
            'angkatan' => 'nullable|string|max:20',
            'tahun_lulus' => 'nullable|digits:4',
            'profesi_terkini' => 'nullable|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $departement = $validated['prodi']
            ? Departement::where('slug', $validated['prodi'])->first()
            : null;

        $alumnus = Alumni::whereRaw('LOWER(TRIM(nama)) = ?', [strtolower(trim($validated['nama']))])
            ->when($validated['tahun_lulus'] ?? null, fn ($q) => $q->where('tahun_lulus', $validated['tahun_lulus']))
            ->when($departement, fn ($q) => $q->where('id_departement', $departement->id))
            ->first();

        $validated['id_alumnus'] = $alumnus?->id;
        $validated['id_departement'] = $departement?->id;
        $validated['status'] = 'pending';
        unset($validated['prodi']);

        $data = AlumniUpdateSubmission::create($validated);

        return response()->json($data, 201);
    }
}