<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FakultasAPIController;
use App\Http\Controllers\Api\AcademicAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// fakultas
Route::get('/fakultas', [FakultasAPIController::class, 'getFakultas'])->name('getFakultas');

// departement
Route::get('/departement', [FakultasAPIController::class, 'getDepartementAll'])->name('getDepartementAll');
Route::get('/departement/{slug}', [FakultasAPIController::class, 'getDepartementSlug'])->name('getDepartementSlug');

// usp
Route::get('/unggulan', [FakultasAPIController::class, 'getUnggulanAll'])->name('getUnggulanAll');
Route::get('/unggulan-home', [FakultasAPIController::class, 'getUnggulanByHome'])->name('getUnggulanByHome');
Route::get('/unggulan/{id}', [FakultasAPIController::class, 'getUnggulanByDepeartmenet'])->name('getUnggulanByDepeartmenet');

// prospek
Route::get('/prospek', [FakultasAPIController::class, 'getProspekAll'])->name('getProspekAll');
Route::get('/prospek-home', [FakultasAPIController::class, 'getProspekByHome'])->name('getProspekByHome');
Route::get('/prospek/{id}', [FakultasAPIController::class, 'getProspekByDepeartmenet'])->name('getProspekByDepeartmenet');

// Kurikulum
Route::get('/kurikulum', [FakultasAPIController::class, 'getKurikulumAll'])->name('getKurikulumAll');
Route::get('/kurikulum-home', [FakultasAPIController::class, 'getKurikulumByHome'])->name('getKurikulumByHome');
Route::get('/kurikulum/{id}', [FakultasAPIController::class, 'getKurikulumByDepeartmenet'])->name('getKurikulumByDepeartmenet');

// fasilitas
Route::get('/fasilitas', [FakultasAPIController::class, 'getFasilitasAll'])->name('getFasilitasAll');
Route::get('/fasilitas-home', [FakultasAPIController::class, 'getFasilitasByHome'])->name('getFasilitasByHome');
Route::get('/fasilitas/{id}', [FakultasAPIController::class, 'getFasilitasByDepartement'])->name('getFasilitasByDepartement');

// prestasi
Route::get('/prestasi', [FakultasAPIController::class, 'getPrestasiAll'])->name('getPrestasiAll');
Route::get('/prestasi-home', [FakultasAPIController::class, 'getPrestasiByHome'])->name('getPrestasiByHome');
Route::get('/prestasi/{id}', [FakultasAPIController::class, 'getPrestasiByDepartement'])->name('getPrestasiByDepartement');


// organisasi
Route::get('/organisasi', [FakultasAPIController::class, 'getOrganisasiAll'])->name('getOrganisasiAll');
Route::get('/organisasi-home', [FakultasAPIController::class, 'getOrganisasiByHome'])->name('getorganisasiByHome');
Route::get('/organisasi/{id}', [FakultasAPIController::class, 'getOrganisasiByDepartement'])->name('getorganisasiByDepartement');

// testimoni
Route::get('/testimoni', [FakultasAPIController::class, 'getTestimoniAll'])->name('getTestimoniAll');
Route::get('/testimoni-home', [FakultasAPIController::class, 'getTestimoniByHome'])->name('getTestimoniByHome');
Route::get('/testimoni/{id}', [FakultasAPIController::class, 'getTestimoniByDepartement'])->name('getTestimoniByDepartement');

// portofolio
Route::get('/portofolio', [FakultasAPIController::class, 'getPortofolioAll'])->name('getPortofolioAll');
Route::get('/portofolio-home', [FakultasAPIController::class, 'getPortofolioByHome'])->name('getPortofolioByHome');
Route::get('/portofolio/{id}', [FakultasAPIController::class, 'getPortofolioByDepartement'])->name('getPortofolioByDepartement');

// support
Route::get('/suport', [FakultasAPIController::class, 'getSuportAll'])->name('getSuportAll');
Route::get('/suport-home', [FakultasAPIController::class, 'getSuportByHome'])->name('getSuportByHome');
Route::get('/suport/{id}', [FakultasAPIController::class, 'getSuportByDepartement'])->name('getSuportByDepartement');

// Faqs
Route::get('/faqs', [FakultasAPIController::class, 'getFaqsAll'])->name('getFaqsAll');

// post
Route::get('/post', [FakultasAPIController::class, 'getPostAll'])->name('getPostAll');
Route::get('/post/{slug}', [FakultasAPIController::class, 'getPostSlug'])->name('getPostSlug');

// agenda
Route::get('/agenda', [FakultasAPIController::class, 'getAgendaAll'])->name('getAgendaAll');
Route::get('/agenda/{slug}', [FakultasAPIController::class, 'getAgendaSlug'])->name('getAgendaSlug');

// team
Route::get('/team', [FakultasAPIController::class, 'getTeamAll'])->name('getTeamAll');
Route::get('/team-home', [FakultasAPIController::class, 'getTeamByHome'])->name('getTeamByHome');
Route::get('/team/{id}', [FakultasAPIController::class, 'getTeamByDepartement'])->name('getTeamByDepartement');

// legal Dokumen
Route::get('/legalitas', [FakultasAPIController::class, 'getLegalitasAll'])->name('getLegalitasAll');
Route::get('/legalitas-home', [FakultasAPIController::class, 'getLegalitasByHome'])->name('getLegalitasByHome');
Route::get('/legalitas/{id}', [FakultasAPIController::class, 'getLegalitasByDepartement'])->name('getLegalitasByDepartement');

// Partmer
Route::get('/partner', [FakultasAPIController::class, 'getPartnerAll'])->name('getPartnerAll');
Route::get('/partner-home', [FakultasAPIController::class, 'getPartnerByHome'])->name('getPartnerByHome');
Route::get('/partner/{id}', [FakultasAPIController::class, 'getPartnerByDepartement'])->name('getPartnerByDepartement');

// Indentity
Route::get('/indentity', [FakultasAPIController::class, 'getIdentityOne'])->name('getIdentityOne');

// anality
Route::get('/analytics', [FakultasAPIController::class, 'getAnalytics'])->name('getAnalytics');

// Slider
Route::get('/slider', [FakultasAPIController::class, 'getSliderAll'])->name('getSliderAll');
Route::get('/slider-home', [FakultasAPIController::class, 'getSliderByHome'])->name('getSliderByHome');
Route::get('/slider/{id}', [FakultasAPIController::class, 'getSliderByDepartement'])->name('getSliderByDepartement');

// jurnal
Route::get('/jurnal', [FakultasAPIController::class, 'getJurnalAll'])->name('getJurnalAll');
Route::get('/jurnal-home', [FakultasAPIController::class, 'getJurnalByHome'])->name('getJurnalByHome');
Route::get('/jurnal/{id}', [FakultasAPIController::class, 'getJurnalByDepartement'])->name('getJurnalByDepartement');

// timeline
Route::get('/timeline', [FakultasAPIController::class, 'getTimelineAll'])->name('getTimelineAll');
Route::get('/timeline-home', [FakultasAPIController::class, 'getTimelineByHome'])->name('getTimelineByHome');
Route::get('/timeline/{id}', [FakultasAPIController::class, 'getTimelineByDepartement'])->name('getTimelineByDepartement');

// timeline
Route::get('/side-baner', [FakultasAPIController::class, 'getSideBanner'])->name('getSideBanner');

Route::get('/akademik/kompetensi-lulusan', [AcademicAPIController::class, 'getKompetensiLulusan'])->name('getKompetensiLulusan');
 
// CPL (Learning Outcomes) per prodi
Route::get('/akademik/cpl/{slug}', [AcademicAPIController::class, 'getCplByDepartement'])->name('getCplByDepartement');
 
// Kurikulum per prodi
Route::get('/akademik/kurikulum/{slug}', [AcademicAPIController::class, 'getCurriculumByDepartement'])->name('getCurriculumByDepartement');
Route::get('/akademik/kurikulum/{slug}/aktif', [AcademicAPIController::class, 'getCurriculumActiveByDepartement'])->name('getCurriculumActiveByDepartement');
 
// Laboratorium per prodi
Route::get('/akademik/laboratorium/{slug}', [AcademicAPIController::class, 'getLaboratoriumByDepartement'])->name('getLaboratoriumByDepartement');
 
// Alumni per prodi (support query ?angkatan=)
Route::get('/akademik/alumni/{slug}', [AcademicAPIController::class, 'getAlumniByDepartement'])->name('getAlumniByDepartement');
 
// Tracer Study per prodi
Route::get('/akademik/tracer-study/{slug}', [AcademicAPIController::class, 'getTracerStudyByDepartement'])->name('getTracerStudyByDepartement');
 
// Akreditasi — PENTING: route tanpa parameter didaftarkan SEBELUM yang single-segment
// agar tidak ambigu; di sini aman karena "akreditasi" (all) dan "akreditasi/{slug}" beda jumlah segmen.
Route::get('/akademik/akreditasi', [AcademicAPIController::class, 'getAkreditasiAll'])->name('getAkreditasiAll');
Route::get('/akademik/akreditasi/{slug}', [AcademicAPIController::class, 'getAkreditasiByDepartement'])->name('getAkreditasiByDepartement');
 
// Program Perkuliahan (Study Mode) — 4 data tetap: reguler/hybrid/pjj/fast-track
Route::get('/akademik/program-perkuliahan', [AcademicAPIController::class, 'getProgramPerkuliahanAll'])->name('getProgramPerkuliahanAll');
Route::get('/akademik/program-perkuliahan/{slug}', [AcademicAPIController::class, 'getProgramPerkuliahanSlug'])->name('getProgramPerkuliahanSlug');
 
// Biaya Pendidikan (support query ?tahun_akademik= ?departement= ?jenjang= ?jenis_program= ?semester=)
Route::get('/akademik/biaya-pendidikan', [AcademicAPIController::class, 'getBiayaPendidikan'])->name('getBiayaPendidikan');
 
// Pengumuman / Papan Pengumuman (support query ?kategori= ?tahun= ?search=)
Route::get('/akademik/pengumuman', [AcademicAPIController::class, 'getPengumumanAll'])->name('getPengumumanAll');
Route::get('/akademik/pengumuman/{slug}', [AcademicAPIController::class, 'getPengumumanSlug'])->name('getPengumumanSlug');
 
// Kalender Akademik (agenda dengan flag is_academic_calendar, support query ?bulan= ?tahun= ?kategori=)
Route::get('/akademik/kalender', [AcademicAPIController::class, 'getKalenderAkademik'])->name('getKalenderAkademik');
 
// Buku Panduan Akademik
Route::get('/akademik/panduan', [AcademicAPIController::class, 'getPanduanAkademik'])->name('getPanduanAkademik');
 
// Daftar Peraturan Akademik (support query ?sub_kategori= ?status=)
Route::get('/akademik/peraturan', [AcademicAPIController::class, 'getPeraturanAkademik'])->name('getPeraturanAkademik');
 
// Layanan Akademik & Administrasi (portal eksternal)
Route::get('/akademik/layanan', [AcademicAPIController::class, 'getLayananAkademik'])->name('getLayananAkademik');
 
// Search agregasi lintas modul akademik
Route::get('/search-akademik', [AcademicAPIController::class, 'searchAkademik'])->name('searchAkademik');