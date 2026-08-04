<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AcademicDocument;
use App\Models\AcademicServicePortal;
use App\Models\Accreditation;
use App\Models\Alumni;
use App\Models\Announcement;
use App\Models\Course;
use App\Models\CurriculumPeriod;
use App\Models\Departement;
use App\Models\FacultyCompetency;
use App\Models\Laboratory;
use App\Models\LearningOutcome;
use App\Models\StudyMode;
use App\Models\TracerStudy;
use App\Models\TuitionFee;
use Illuminate\Http\Request;

class AcademicAPIController extends Controller
{
    public function getKompetensiLulusan()
    {
        $data = FacultyCompetency::first();
        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getCplByDepartement($slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = LearningOutcome::where('id_departement', $departement->id)
            ->orderBy('kategori')
            ->orderBy('urutan')
            ->get();

        return response()->json($data);
    }

    public function getCurriculumByDepartement($slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = CurriculumPeriod::where('id_departement', $departement->id)
            ->with(['courses' => function ($query) {
                $query->orderBy('semester')->orderBy('urutan');
            }])
            ->orderByDesc('tahun_kurikulum')
            ->get();

        return response()->json($data);
    }

    public function getCurriculumActiveByDepartement($slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = CurriculumPeriod::where('id_departement', $departement->id)
            ->where('status', 'aktif')
            ->with(['courses' => function ($query) {
                $query->orderBy('semester')->orderBy('urutan');
            }])
            ->first();

        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getLaboratoriumByDepartement($slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = Laboratory::where('id_departement', $departement->id)->get();

        return response()->json($data);
    }

    public function getAlumniByDepartement(Request $request, $slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = Alumni::where('id_departement', $departement->id)
            ->when($request->angkatan, fn ($q) => $q->where('angkatan', $request->angkatan))
            ->orderByDesc('tahun_lulus')
            ->get();

        return response()->json($data);
    }

    public function getTracerStudyByDepartement($slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = TracerStudy::where('id_departement', $departement->id)
            ->orderByDesc('tahun')
            ->orderBy('label')
            ->get();

        return response()->json($data);
    }

    public function getAkreditasiByDepartement($slug)
    {
        $departement = Departement::where('slug', $slug)->first();
        if (! $departement) {
            return response()->json(['message' => 'departement not found'], 404);
        }

        $data = Accreditation::where('id_departement', $departement->id)
            ->where('is_public', true)
            ->orderByDesc('tanggal_berlaku')
            ->get();

        return response()->json($data);
    }

    public function getAkreditasiAll(Request $request)
    {
        $data = Accreditation::with('departement')
            ->where('is_public', true)
            ->when($request->jenjang, fn ($q) => $q->where('jenjang', $request->jenjang))
            ->when($request->prodi, fn ($q) => $q->whereHas('departement', function ($query) use ($request) {
                $query->where('slug', $request->prodi);
            }))
            ->when($request->status, fn ($q) => $q->where('status', $request->status))
            ->orderByDesc('tanggal_berlaku')
            ->get();

        return response()->json($data);
    }

    public function getProgramPerkuliahanAll()
    {
        $data = StudyMode::orderBy('urutan')->get();

        return response()->json($data);
    }

    public function getProgramPerkuliahanSlug($slug)
    {
        $data = StudyMode::where('slug', $slug)->first();
        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getBiayaPendidikan(Request $request)
    {
        $data = TuitionFee::with('departement')
            ->when($request->tahun_akademik, fn ($q) => $q->where('tahun_akademik', $request->tahun_akademik))
            ->when($request->departement, fn ($q) => $q->whereHas('departement', function ($query) use ($request) {
                $query->where('slug', $request->departement);
            }))
            ->when($request->jenjang, fn ($q) => $q->where('jenjang', $request->jenjang))
            ->when($request->jenis_program, fn ($q) => $q->where('jenis_program', $request->jenis_program))
            ->when($request->semester, fn ($q) => $q->where('semester', $request->semester))
            ->get();

        return response()->json($data);
    }

    public function getPengumumanAll(Request $request)
    {
        $data = Announcement::when($request->kategori, fn ($q) => $q->where('kategori', $request->kategori))
            ->when($request->tahun, fn ($q) => $q->whereYear('tanggal_publikasi', $request->tahun))
            ->when($request->search, fn ($q) => $q->where('judul', 'like', '%'.$request->search.'%'))
            ->orderByDesc('is_pinned')
            ->orderByDesc('tanggal_publikasi')
            ->get();

        return response()->json($data);
    }

    public function getPengumumanSlug($slug)
    {
        $data = Announcement::where('slug', $slug)->first();
        if (! $data) {
            return response()->json(['message' => 'resource not found'], 404);
        }

        return response()->json($data);
    }

    public function getKalenderAkademik(Request $request)
    {
        $data = \App\Models\Agenda::where('is_academic_calendar', true)
            ->when($request->bulan, fn ($q) => $q->whereMonth('start_date', $request->bulan))
            ->when($request->tahun, fn ($q) => $q->whereYear('start_date', $request->tahun))
            ->when($request->kategori, fn ($q) => $q->where('category', $request->kategori))
            ->orderBy('start_date')
            ->get();

        return response()->json($data);
    }

    public function getPanduanAkademik()
    {
        $data = AcademicDocument::where('kategori', 'buku_panduan')
            ->orderByDesc('tahun_akademik')
            ->get();

        return response()->json($data);
    }

    public function getPeraturanAkademik(Request $request)
    {
        $data = AcademicDocument::where('kategori', 'peraturan')
            ->when($request->sub_kategori, fn ($q) => $q->where('sub_kategori', $request->sub_kategori))
            ->when($request->status, fn ($q) => $q->where('status', $request->status))
            ->orderByDesc('tanggal_terbit')
            ->get();

        return response()->json($data);
    }

    public function getLayananAkademik()
    {
        $data = AcademicServicePortal::where('status', 'aktif')
            ->orderBy('urutan')
            ->get();

        return response()->json($data);
    }

    public function searchAkademik(Request $request)
    {
        $q = $request->query('q');
        if (! $q) {
            return response()->json(['message' => 'parameter q wajib diisi'], 422);
        }

        $programStudi = Departement::where('name', 'like', "%{$q}%")->limit(5)->get();
        $pengumuman = Announcement::where('judul', 'like', "%{$q}%")->limit(5)->get();
        $peraturan = AcademicDocument::where('kategori', 'peraturan')->where('judul', 'like', "%{$q}%")->limit(5)->get();
        $dokumen = AcademicDocument::where('judul', 'like', "%{$q}%")->limit(5)->get();
        $dosen = \App\Models\Ourteam::where('name', 'like', "%{$q}%")->limit(5)->get();
        $layanan = AcademicServicePortal::where('nama_sistem', 'like', "%{$q}%")->limit(5)->get();

        return response()->json([
            'program_studi' => $programStudi,
            'pengumuman' => $pengumuman,
            'peraturan' => $peraturan,
            'dokumen' => $dokumen,
            'dosen' => $dosen,
            'layanan' => $layanan,
        ]);
    }
}