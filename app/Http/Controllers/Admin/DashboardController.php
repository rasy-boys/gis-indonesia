<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\GaleriFoto;
use App\Models\Team;
use App\Models\Pamflet;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = GaleriFoto::count();
        $totalTeams = Team::count();
        $totalPamflets = Pamflet::count();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalGaleri',
            'totalTeams',
            'totalPamflets'
        ));
    }
}
