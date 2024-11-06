<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use App\Models\Survey;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data permohonan berdasarkan status
        $diterima = Permohonan::where('status', 'Diterima')->count();
        $diproses = Permohonan::where('status',     'Diproses')->count();
        $ditolak = Permohonan::where('status', 'Ditolak')->count();

        // $surveys = Survey::all();

        // Mengarahkan ke view dashboard dan mengirim data
        return view('dashboard', [
            'diterima' => $diterima,
            'diproses' => $diproses,
            'ditolak' => $ditolak,
            // 'surveys' => $surveys,
        ]);
        
    }
}
