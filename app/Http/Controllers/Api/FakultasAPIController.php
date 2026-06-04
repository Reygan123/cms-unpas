<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Models\Usp;
use App\Models\Post;
use App\Models\Agenda;
use App\Models\Jurnal;
use App\Models\Slider;
use App\Models\Faculty;
use App\Models\Ourteam;
use App\Models\Partner;
use App\Models\Prospek;
use App\Models\Support;
use App\Models\Analytic;
use App\Models\Facility;
use App\Models\Identity;
use App\Models\Timeline;
use App\Models\Kurikulum;
use App\Models\Portofolio;
use App\Models\Achievement;
use App\Models\Departement;
use App\Models\Testimonial;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\Legal_document;
use App\Models\Side_baner;
use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *     title="Fakultas",
 *     version="0.1",
 *     description="Dokumentasi API PMB Universitas Pasundan",
 * )
 */

class FakultasAPIController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/fakultas",
     *     tags={"Fakultas"},
     *     @OA\Response(
     *         response="200",
     *         description="The data"
     *     )
     * )
     */
    public function getFakultas()
    {
        $fakultas = Faculty::first();
        return response()->json($fakultas);
    }
    
    /**
     * @OA\Get(
     *     path="/api/departement",
     *     tags={"Departement"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Departement"
     *     )
     * )
     */
    public function getDepartementAll()
    {
        $departement = Departement::all();
        return response()->json($departement);
    }
    
    /**
     * @OA\Get(
     *     path="/api/departement/{slug}",
     *     tags={"Departement"},
     *     @OA\Response(
     *         response="200",
     *         description="Get One Data Departement by Slug"
     *     )
     * )
     */
    public function getDepartementSlug($slug)
    {
        $departement = Departement::where('slug', $slug)->first(); // Ambil data pertamanya

        if (!$departement) {
            return response()->json([
                'message' => 'Departement not found',
            ], 404);
        }

        return response()->json($departement);
    }

    /**
     * @OA\Get(
     *     path="/api/unggulan",
     *     tags={"USP"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Unggulan"
     *     )
     * )
     */
    public function getUnggulanAll()
    {
        $usps = Usp::all();
        if (!$usps) {
            return response()->json([
                'message' => 'Unggulan not found',
            ], 404);
        }
        return response()->json($usps);
    }
    
    /**
     * @OA\Get(
     *     path="/api/unggulan-home",
     *     tags={"USP"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Unggulan By Home"
     *     )
     * )
     */
    public function getUnggulanByHome()
    {
        $usps = Usp::where('home', '1')->get();
        if (!$usps) {
            return response()->json([
                'message' => 'Unggulan not found',
            ], 404);
        }
        return response()->json($usps);
    }
    
    /**
     * @OA\Get(
     *     path="/api/unggulan/{id}",
     *     tags={"USP"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All By Departement ID"
     *     )
     * )
     */
    public function getUnggulanByDepeartmenet($id)
    {
        $usps = Usp::where('id_departement', $id)->get();
        if (!$usps) {
            return response()->json([
                'message' => 'Unggulan not found',
            ], 404);
        }
        return response()->json($usps);
    }
    
    /**
     * @OA\Get(
     *     path="/api/prospek",
     *     tags={"Prospek"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Prospek"
     *     )
     * )
     */
    public function getProspekAll()
    {
        $prospek = Prospek::all();
        if (!$prospek) {
            return response()->json([
                'message' => 'Prospek not found',
            ], 404);
        }
        return response()->json($prospek);
    }
    
    /**
     * @OA\Get(
     *     path="/api/prospek-home",
     *     tags={"Prospek"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Prospek By Home"
     *     )
     * )
     */
    public function getProspekByHome()
    {
        $prospek = Prospek::where('home', '1')->get();
        if (!$prospek) {
            return response()->json([
                'message' => 'Prospek not found',
            ], 404);
        }
        return response()->json($prospek);
    }
    
    /**
     * @OA\Get(
     *     path="/api/prospek/{id}",
     *     tags={"Prospek"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All By Departement ID"
     *     )
     * )
     */
    public function getProspekByDepeartmenet($id)
    {
        $prospek = Prospek::where('id_departement', $id)->get();
        if (!$prospek) {
            return response()->json([
                'message' => 'Prospek not found',
            ], 404);
        }
        return response()->json($prospek);
    }
    
    /**
     * @OA\Get(
     *     path="/api/kurikulum",
     *     tags={"Kurikulum"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Kurikulum"
     *     )
     * )
     */
    public function getKurikulumAll()
    {
        $kurkulum = Kurikulum::all();
        if (!$kurkulum) {
            return response()->json([
                'message' => 'kurkulum not found',
            ], 404);
        }
        return response()->json($kurkulum);
    }
    
    /**
     * @OA\Get(
     *     path="/api/kurikulum-home",
     *     tags={"Kurikulum"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Kurikulum By Home"
     *     )
     * )
     */
    public function getKurikulumByHome()
    {
        $kurikulum = Kurikulum::where('home', '1')->get();
        if (!$kurikulum) {
            return response()->json([
                'message' => 'kurikulum not found',
            ], 404);
        }
        return response()->json($kurikulum);
    }
    
    /**
     * @OA\Get(
     *     path="/api/kurikulum/{id}",
     *     tags={"Kurikulum"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All By Departement ID"
     *     )
     * )
     */
    public function getKurikulumByDepeartmenet($id)
    {
        $kurikulum = Kurikulum::where('id_departement', $id)->get();
        if (!$kurikulum) {
            return response()->json([
                'message' => 'kurikulum not found',
            ], 404);
        }
        return response()->json($kurikulum);
    }
    
    /**
     * @OA\Get(
     *     path="/api/fasilitas",
     *     tags={"Fasilitas"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Fasilitas"
     *     )
     * )
     */
    public function getFasilitasAll()
    {
        $fasilitas = Facility::all();
        if (!$fasilitas) {
            return response()->json([
                'message' => 'fasilitas not found',
            ], 404);
        }
        return response()->json($fasilitas);
    }
    
    /**
     * @OA\Get(
     *     path="/api/fasilitas-home",
     *     tags={"Fasilitas"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Fasilitas by Home"
     *     )
     * )
     */
    public function getFasilitasByHome()
    {
        $fasilitas = Facility::where('home', '1')->get();
        if (!$fasilitas) {
            return response()->json([
                'message' => 'fasilitas not found',
            ], 404);
        }
        return response()->json($fasilitas);
    }
    
    /**
     * @OA\Get(
     *     path="/api/fasilitas/{id}",
     *     tags={"Fasilitas"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Fasilitas By Id Departmenet"
     *     )
     * )
     */
    public function getFasilitasByDepartement($id)
    {
        $fasilitas = Facility::where('id_departement', $id)->get()->first();
        if (!$fasilitas) {
            return response()->json([
                'message' => 'fasilitas not found',
            ], 404);
        }
        return response()->json($fasilitas);
    }
    
    /**
     * @OA\Get(
     *     path="/api/prestasi",
     *     tags={"Prestasi"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Prestasi"
     *     )
     * )
     */
    public function getPrestasiAll()
    {
        $prestasi = Achievement::all();
        if (!$prestasi) {
            return response()->json([
                'message' => 'prestasi not found',
            ], 404);
        }
        return response()->json($prestasi);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/prestasi-home",
     *     tags={"Prestasi"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Prestasi By Home"
     *     )
     * )
     */
    public function getPrestasiByHome()
    {
        $prestasi = Achievement::where('home', '1')->get();
        if (!$prestasi) {
            return response()->json([
                'message' => 'prestasi not found',
            ], 404);
        }
        return response()->json($prestasi);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/prestasi/{id}",
     *     tags={"Prestasi"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Prestasi By Id Departement"
     *     )
     * )
     */
    public function getPrestasiByDepartement($id)
    {
        $prestasi = Achievement::where('id_departement', $id)->get();
        if (!$prestasi) {
            return response()->json([
                'message' => 'prestasi not found',
            ], 404);
        }
        return response()->json($prestasi);
    }
    
    /**
     * @OA\Get(
     *     path="/api/organisasi",
     *     tags={"Organisasi"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Organisasi"
     *     )
     * )
     */
    public function getOrganisasiAll()
    {
        $organisasi = Organization::all();
        if (!$organisasi) {
            return response()->json([
                'message' => 'Organisasi not found',
            ], 404);
        }
        return response()->json($organisasi);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/organisasi-home",
     *     tags={"Organisasi"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Organisasi By Home"
     *     )
     * )
     */
    public function getOrganisasiByHome()
    {
        $organisasi = Organization::where('home', '1')->get();
        if (!$organisasi) {
            return response()->json([
                'message' => 'Organisasi not found',
            ], 404);
        }
        return response()->json($organisasi);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/organisasi/{id}",
     *     tags={"Organisasi"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Organisasi By Id Departement"
     *     )
     * )
     */
    public function getOrganisasiByDepartement($id)
    {
        $organisasi = Organization::where('id_departement', $id)->get();
        if (!$organisasi) {
            return response()->json([
                'message' => 'Organisasi not found',
            ], 404);
        }
        return response()->json($organisasi);
    }
    
    /**
     * @OA\Get(
     *     path="/api/testimoni",
     *     tags={"Testimoni"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Testimoni"
     *     )
     * )
     */
    public function getTestimoniAll()
    {
        $testimoni = Testimonial::all();
        if (!$testimoni) {
            return response()->json([
                'message' => 'Testimoni not found',
            ], 404);
        }
        return response()->json($testimoni);
    }
        
    /**
     * @OA\Get(
     *     path="/api/testimoni-home",
     *     tags={"Testimoni"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Testimoni By Home"
     *     )
     * )
     */
    public function getTestimoniByHome()
    {
        $testimoni = Testimonial::where('home', '1')->get();
        if (!$testimoni) {
            return response()->json([
                'message' => 'Testimoni not found',
            ], 404);
        }
        return response()->json($testimoni);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/testimoni/{id}",
     *     tags={"Testimoni"},
     * @OA\Parameter(
    *         name="ID",
    *         in="path",
    *         description="Id of the departement",
    *         required=true,
    *         @OA\Schema(
    *             type="string"
    *         )
    *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Testimoni By Id Departement"
     *     )
     * )
     */
    public function getTestimoniByDepartement($id)
    {
        $testimoni = Testimonial::where('id_departement', $id)->get();
        if (!$testimoni) {
            return response()->json([
                'message' => 'testimoni not found',
            ], 404);
        }
        return response()->json($testimoni);
    }
    
    /**
     * @OA\Get(
     *     path="/api/portofolio",
     *     tags={"Portofolio"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Portofolio"
     *     )
     * )
     */
    public function getPortofolioAll()
    {
        $portofolio = Portofolio::all();
        if (!$portofolio) {
            return response()->json([
                'message' => 'portofolio not found',
            ], 404);
        }
        return response()->json($portofolio);
    }
        
    /**
     * @OA\Get(
     *     path="/api/portofolio-home",
     *     tags={"Portofolio"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Portofolio By Home"
     *     )
     * )
     */
    public function getPortofolioByHome()
    {
        $portofolio = Portofolio::where('home', '1')->get();
        if (!$portofolio) {
            return response()->json([
                'message' => 'portofolio not found',
            ], 404);
        }
        return response()->json($portofolio);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/portofolio/{id}",
     *     tags={"Portofolio"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Portofolio By Id Departement"
     *     )
     * )
     */
    public function getPortofolioByDepartement($id)
    {
        $portofolio = Portofolio::where('id_departement', $id)->first();
        if (!$portofolio) {
            return response()->json([
                'message' => 'portofolio not found',
            ], 404);
        }
        return response()->json($portofolio);
    }
    
    /**
     * @OA\Get(
     *     path="/api/suport",
     *     tags={"Sopport"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Suport"
     *     )
     * )
     */
    public function getSuportAll()
    {
        $suport = Support::all();
        if (!$suport) {
            return response()->json([
                'message' => 'suport not found',
            ], 404);
        }
        return response()->json($suport);
    }
        
    /**
     * @OA\Get(
     *     path="/api/suport-home",
     *     tags={"Sopport"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Suport By Home"
     *     )
     * )
     */
    public function getSuportByHome()
    {
        $suport = Support::where('home', '1')->get();
        if (!$suport) {
            return response()->json([
                'message' => 'suport not found',
            ], 404);
        }
        return response()->json($suport);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/suport/{id}",
     *     tags={"Sopport"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Suport By Id Departement"
     *     )
     * )
     */
    public function getSuportByDepartement($id)
    {
        $suport = Support::where('id_departement', $id)->get();
        if (!$suport) {
            return response()->json([
                'message' => 'suport not found',
            ], 404);
        }
        return response()->json($suport);
    }
    
    /**
     * @OA\Get(
     *     path="/api/faqs",
     *     tags={"Faqs"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Faqs"
     *     )
     * )
     */
    public function getFaqsAll()
    {
        $faqs = Faq::with('category')->get();

        $data = $faqs->map(function ($faq) {
            return [
                'id' => $faq->id,
                'question' => $faq->question,
                'answer' => $faq->answer,
                'category_name' => $faq->category ? $faq->category->name : null,
            ];
        });

        return response()->json($data);
    }
   
    /**
     * @OA\Get(
     *     path="/api/post",
     *     tags={"Post"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Post"
     *     )
     * )
     */
    public function getPostAll()
    {
        $post = Post::all();
        if (!$post) {
            return response()->json([
                'message' => 'post not found',
            ], 404);
        }
        return response()->json($post);
    }

    /**
     * @OA\Get(
     *     path="/api/post/{slug}",
     *     tags={"Post"},
     *     @OA\Response(
     *         response="200",
     *         description="Get One Data POST by Slug"
     *     )
     * )
     */
    public function getPostSlug($slug)
    {
        $post = Post::where('slug', $slug)->first(); // Ambil data pertamanya

        if (!$post) {
            return response()->json([
                'message' => 'post not found',
            ], 404);
        }

        return response()->json($post);
    }
    
    /**
     * @OA\Get(
     *     path="/api/agenda",
     *     tags={"Agenda"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Agenda"
     *     )
     * )
     */
    public function getAgendaAll()
    {
        $agenda = Agenda::all();
        if (!$agenda) {
            return response()->json([
                'message' => 'agenda not found',
            ], 404);
        }
        return response()->json($agenda);
    }

    /**
     * @OA\Get(
     *     path="/api/agenda/{slug}",
     *     tags={"Agenda"},
     *     @OA\Response(
     *         response="200",
     *         description="Get One Data AGENDA by Slug"
     *     )
     * )
     */
    public function getAgendaSlug($slug)
    {
        $agenda = Agenda::where('slug', $slug)->first(); // Ambil data pertamanya

        if (!$agenda) {
            return response()->json([
                'message' => 'agenda not found',
            ], 404);
        }

        return response()->json($agenda);
    }

    /**
     * @OA\Get(
     *     path="/api/team",
     *     tags={"Our Team"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Ourteam"
     *     )
     * )
     */
    public function getTeamAll()
    {
        $team = Ourteam::all();
        if (!$team) {
            return response()->json([
                'message' => 'team not found',
            ], 404);
        }
        return response()->json($team);
    }
        
    /**
     * @OA\Get(
     *     path="/api/team-home",
     *     tags={"Our Team"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Ourteam By Home"
     *     )
     * )
     */
    public function getTeamByHome()
    {
        $team = Ourteam::where('home', '1')->get();
        if (!$team) {
            return response()->json([
                'message' => 'team not found',
            ], 404);
        }
        return response()->json($team);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/team/{id}",
     *     tags={"Our Team"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Ourteam By Id Departement"
     *     )
     * )
     */
    public function getTeamByDepartement($id)
    {
        $team = Ourteam::where('id_departement', $id)->get();
        if (!$team) {
            return response()->json([
                'message' => 'team not found',
            ], 404);
        }
        return response()->json($team);
    }
    
    /**
     * @OA\Get(
     *     path="/api/legalitas",
     *     tags={"Legalitas"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Legalitas Dokumen"
     *     )
     * )
     */
    public function getLegalitasAll()
    {
        $legal = Legal_document::all();
        if (!$legal) {
            return response()->json([
                'message' => 'legal not found',
            ], 404);
        }
        return response()->json($legal);
    }
        
    /**
     * @OA\Get(
     *     path="/api/legalitas-home",
     *     tags={"Legalitas"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Legalitas By Home"
     *     )
     * )
     */
    public function getLegalitasByHome()
    {
        $legal = Legal_document::where('home', '1')->get();
        if (!$legal) {
            return response()->json([
                'message' => 'legal not found',
            ], 404);
        }
        return response()->json($legal);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/legalitas/{id}",
     *     tags={"Legalitas"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Legalitas By Id Departement"
     *     )
     * )
     */
    public function getLegalitasByDepartement($id)
    {
        $legalitas = Legal_document::where('id_departement', $id)->get();
        if (!$legalitas) {
            return response()->json([
                'message' => 'legalitas not found',
            ], 404);
        }
        return response()->json($legalitas);
    }
    
    /**
     * @OA\Get(
     *     path="/api/partner",
     *     tags={"Partners"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data partner Dokumen"
     *     )
     * )
     */
    public function getPartnerAll()
    {
        $partner = Partner::all();
        if (!$partner) {
            return response()->json([
                'message' => 'partner not found',
            ], 404);
        }
        return response()->json($partner);
    }
        
    /**
     * @OA\Get(
     *     path="/api/partner-home",
     *     tags={"Partners"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data partner By Home"
     *     )
     * )
     */
    public function getPartnerByHome()
    {
        $partner = Partner::where('home', '1')->get();
        if (!$partner) {
            return response()->json([
                'message' => 'partner not found',
            ], 404);
        }
        return response()->json($partner);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/partner/{id}",
     *     tags={"Partners"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data partner By Id Departement"
     *     )
     * )
     */
    public function getPartnerByDepartement($id)
    {
        $partner = Partner::where('id_departement', $id)->get();
        if (!$partner) {
            return response()->json([
                'message' => 'partner not found',
            ], 404);
        }
        return response()->json($partner);
    }
    
    /**
     * @OA\Get(
     *     path="/api/indentity",
     *     tags={"Identity"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data indentity one"
     *     )
     * )
     */
    public function getIdentityOne()
    {
        $indentity = Identity::all();
        if (!$indentity) {
            return response()->json([
                'message' => 'indentity not found',
            ], 404);
        }
        return response()->json($indentity);
    }

    /**
     * @OA\Get(
     *     path="/api/slider",
     *     tags={"Sliders"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data slider Dokumen"
     *     )
     * )
     */
    public function getSliderAll()
    {
        $slider = Slider::all();
        if (!$slider) {
            return response()->json([
                'message' => 'slider not found',
            ], 404);
        }
        return response()->json($slider);
    }
        
    /**
     * @OA\Get(
     *     path="/api/slider-home",
     *     tags={"Sliders"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data slider By Home"
     *     )
     * )
     */
    public function getSliderByHome()
    {
        $slider = Slider::where('home', '1')->get();
        if (!$slider) {
            return response()->json([
                'message' => 'slider not found',
            ], 404);
        }
        return response()->json($slider);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/slider/{id}",
     *     tags={"Sliders"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data slider By Id Departement"
     *     )
     * )
     */
    public function getSliderByDepartement($id)
    {
        $slider = Slider::where('id_departement', $id)->get();
        if (!$slider) {
            return response()->json([
                'message' => 'slider not found',
            ], 404);
        }
        return response()->json($slider);
    }
    
    /**
     * @OA\Get(
     *     path="/api/analytics",
     *     tags={"Analytics"},
     *     @OA\Response(
     *         response="200",
     *         description="Get analytics"
     *     )
     * )
     */
    public function getAnalytics()
    {
        $analytics = Analytic::first();
        if (!$analytics) {
            return response()->json([
                'message' => 'analytics not found',
            ], 404);
        }
        return response()->json($analytics);
    }


    /**
     * @OA\Get(
     *     path="/api/jurnal",
     *     tags={"Jurnal"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Jurnal"
     *     )
     * )
     */
    public function getJurnalAll()
    {
        $jurnal = Jurnal::all();
        if (!$jurnal) {
            return response()->json([
                'message' => 'jurnal not found',
            ], 404);
        }
        return response()->json($jurnal);
    }

     /**
     * @OA\Get(
     *     path="/api/jurnal-home",
     *     tags={"Jurnal"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Jurnal By Home"
     *     )
     * )
     */
    public function getJurnalByHome()
    {
        $jurnal = Jurnal::where('home', '1')->get();
        if (!$jurnal) {
            return response()->json([
                'message' => 'jurnal not found',
            ], 404);
        }
        return response()->json($jurnal);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/jurnal/{id}",
     *     tags={"Jurnal"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Jurnal By Id Departement"
     *     )
     * )
     */
    public function getJurnalByDepartement($id)
    {
        $jurnal = Jurnal::where('id_departement', $id)->first();
        if (!$jurnal) {
            return response()->json([
                'message' => 'jurnal not found',
            ], 404);
        }
        return response()->json($jurnal);
    }
    

     /**
     * @OA\Get(
     *     path="/api/timeline",
     *     tags={"Timeline"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Timeline"
     *     )
     * )
     */
    public function getTimelineAll()
    {
        $timeline = Timeline::all();
        if (!$timeline) {
            return response()->json([
                'message' => 'timeline not found',
            ], 404);
        }
        return response()->json($timeline);
    }

     /**
     * @OA\Get(
     *     path="/api/timeline-home",
     *     tags={"Timeline"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Timeline By Home"
     *     )
     * )
     */
    public function getTimelineByHome()
    {
        $timeline = Timeline::where('home', '1')->get();
        if (!$timeline) {
            return response()->json([
                'message' => 'timeline not found',
            ], 404);
        }
        return response()->json($timeline);
    }
    
    
    /**
     * @OA\Get(
     *     path="/api/timeline/{id}",
     *     tags={"Timeline"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Timeline By Id Departement"
     *     )
     * )
     */
    public function getTimelineByDepartement($id)
    {
        $timeline = Timeline::where('id_departement', $id)->first();
        if (!$timeline) {
            return response()->json([
                'message' => 'timeline not found',
            ], 404);
        }
        return response()->json($timeline);
    }

    /**
     * @OA\Get(
     *     path="/api/side-baner",
     *     tags={"Banner"},
     *     @OA\Response(
     *         response="200",
     *         description="Get All Data Side Baner"
     *     )
     * )
     */
    public function getSideBanner()
    {
        $side = Side_baner::first();
        if (!$side) {
            return response()->json([
                'message' => 'side not found',
            ], 404);
        }
        return response()->json($side);
    }
    
}
