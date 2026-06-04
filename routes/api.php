<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\FakultasAPIController;

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