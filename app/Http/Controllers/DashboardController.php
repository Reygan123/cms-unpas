<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Facility;
use App\Models\Organization;
use App\Models\Partner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalDepartements' => Departement::count(),
            'totalFacilities' => Facility::count(),
            'totalActivities' => Organization::count(),
            'totalPartners' => Partner::count(),
        ]);
    }
}
