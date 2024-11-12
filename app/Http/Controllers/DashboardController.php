<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\Survey;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data permohonan berdasarkan status
        $diterima = Permohonan::where('status', 'Diterima')->count();
        $diproses = Permohonan::where('status', 'Diproses')->count();
        $ditolak = Permohonan::where('status', 'Ditolak')->count();

        // Ambil data survey dan kelompokkan untuk tiap pertanyaan
        $surveyData = Survey::select(
            'question_1', 'question_2', 'question_3', 'question_4', 
            'question_5', 'question_6', 'question_7', 'question_8', 
            'question_9', 'question_10'
        )->get();

        // Proses data untuk setiap pertanyaan dan pilihan
        // Proses data untuk setiap pertanyaan dan pilihan
// Proses data untuk setiap pertanyaan dan pilihan
$questionsData = [];
for ($i = 1; $i <= 10; $i++) {
    $questionKey = "question_$i";

    // Tentukan opsi berdasarkan nomor pertanyaan
    if ($i == 2) {
        // Pertanyaan 2: Pilihan "Tidak Mudah", "Cukup Mudah", "Mudah", "Sangat Mudah"
        $questionsData[$questionKey] = [
            'Tidak Mudah' => $surveyData->where($questionKey, 'Tidak Mudah')->count(),
            'Cukup Mudah' => $surveyData->where($questionKey, 'Cukup Mudah')->count(),
            'Mudah' => $surveyData->where($questionKey, 'Mudah')->count(),
            'Sangat Mudah' => $surveyData->where($questionKey, 'Sangat Mudah')->count(),
        ];
    } elseif ($i == 3) {
        // Pertanyaan 3: Pilihan "Tidak Cukup Cepat", "Cukup Cepat", "Cepat", "Sangat Cepat"
        $questionsData[$questionKey] = [
            'Tidak Cukup Cepat' => $surveyData->where($questionKey, 'Tidak Cukup Cepat')->count(),
            'Cukup Cepat' => $surveyData->where($questionKey, 'Cukup Cepat')->count(),
            'Cepat' => $surveyData->where($questionKey, 'Cepat')->count(),
            'Sangat Cepat' => $surveyData->where($questionKey, 'Sangat Cepat')->count(),
        ];
    } elseif ($i == 4) {
        // Pertanyaan 4: Pilihan "Sangat Mahal", "Mahal", "Murah", "Sangat Murah"
        $questionsData[$questionKey] = [
            'Sangat Mahal' => $surveyData->where($questionKey, 'Sangat Mahal')->count(),
            'Mahal' => $surveyData->where($questionKey, 'Mahal')->count(),
            'Murah' => $surveyData->where($questionKey, 'Murah')->count(),
            'Sangat Murah' => $surveyData->where($questionKey, 'Sangat Murah')->count(),
        ];
    } elseif ($i == 6) {
        // Pertanyaan 6: Pilihan "Tidak Kompeten", "Cukup Kompeten", "Kompeten", "Sangat Kompeten"
        $questionsData[$questionKey] = [
            'Tidak Kompeten' => $surveyData->where($questionKey, 'Tidak Kompeten')->count(),
            'Cukup Kompeten' => $surveyData->where($questionKey, 'Cukup Kompeten')->count(),
            'Kompeten' => $surveyData->where($questionKey, 'Kompeten')->count(),
            'Sangat Kompeten' => $surveyData->where($questionKey, 'Sangat Kompeten')->count(),
        ];
    } elseif ($i >= 7 && $i <= 10) {
        // Pertanyaan 7 hingga 10: Pilihan "Buruk", "Cukup", "Baik", "Sangat Baik"
        $questionsData[$questionKey] = [
            'Buruk' => $surveyData->where($questionKey, 'Buruk')->count(),
            'Cukup' => $surveyData->where($questionKey, 'Cukup')->count(),
            'Baik' => $surveyData->where($questionKey, 'Baik')->count(),
            'Sangat Baik' => $surveyData->where($questionKey, 'Sangat Baik')->count(),
        ];
    } else {
        // Pertanyaan 1 hingga 5: Pilihan "Tidak Sesuai", "Cukup Sesuai", "Sesuai", "Sangat Sesuai"
        $questionsData[$questionKey] = [
            'Tidak Sesuai' => $surveyData->where($questionKey, 'Tidak Sesuai')->count(),
            'Cukup Sesuai' => $surveyData->where($questionKey, 'Cukup Sesuai')->count(),
            'Sesuai' => $surveyData->where($questionKey, 'Sesuai')->count(),
            'Sangat Sesuai' => $surveyData->where($questionKey, 'Sangat Sesuai')->count(),
        ];
    }
}



        return view('dashboard', [
            'diterima' => $diterima,
            'diproses' => $diproses,
            'ditolak' => $ditolak,
            'questionsData' => $questionsData,
        ]);
    }
}
