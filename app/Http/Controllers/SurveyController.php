<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller; // Pastikan ini ada

class SurveyController extends Controller
{

    // Menampilkan daftar survey
    public function index()
{
    // Ambil pengguna yang sedang login
    $user = Auth::user();
    
    // Cek apakah pengguna sudah mengisi survey
    $survey = Survey::where('user_id', $user->id)->first();

    // Cek apakah permohonan terkait dengan pengguna sudah ada dan file_upload sudah diupload
    $permohonan = Permohonan::where('email', $user->email)->first();
    
    // Jika pengguna sudah mengisi survey atau permohonan belum ada atau belum mengupload file_upload
    if ($survey) {
        return redirect()->route('permohonan.index')->with('info', 'Anda sudah mengisi survey.');
    }

    if (!$permohonan || !$permohonan->file_upload) {
        return redirect()->route('permohonan.index')->with('error', 'Anda tidak bisa akses survey karena file belum diupload');
    }

    // Jika belum mengisi survey dan permohonan sudah lengkap, tampilkan halaman survey
    $surveys = Survey::all(); // Mengambil semua data survey
    return view('survey.index', compact('surveys'));
}
    // Menampilkan form untuk membuat survey baru
    public function create()
    {
        return view('survey.create'); // Pastikan ini mengarah ke view yang benar
    }

    // Metode untuk menyimpan data survey
    // Metode untuk menyimpan data survey
    public function store(Request $request)
    {
        Log::info('Data yang diterima:', $request->all());
    
        try {
            // Validasi data dari form survey menggunakan angka sebagai key
            $validatedData = $request->validate([
                '0' => 'required|string',
                '1' => 'required|string',
                '2' => 'required|string',
                '3' => 'required|string',
                '4' => 'required|string',
                '5' => 'required|string',
                '6' => 'required|string',
                '7' => 'required|string',
                '8' => 'required|string',
                '9' => 'required|string',
                'Saran' => 'nullable|string',
            ]);
    
            // Menambahkan user_id dari user yang sedang login
            $surveyData = [
                'user_id' => Auth::id(), // Mendapatkan ID user yang sedang login
                'question_1' => $validatedData['0'], // Pertanyaan pertama
                'question_2' => $validatedData['1'], // Pertanyaan kedua
                'question_3' => $validatedData['2'], // Pertanyaan ketiga
                'question_4' => $validatedData['3'],
                'question_5' => $validatedData['4'],
                'question_6' => $validatedData['5'],
                'question_7' => $validatedData['6'],
                'question_8' => $validatedData['7'],
                'question_9' => $validatedData['8'],
                'question_10' => $validatedData['9'],
                'saran' => $validatedData['Saran'] ?? null, // Field saran opsional
            ];
    
            // Simpan survey ke database
            $survey = Survey::create($surveyData);
    
            Log::info('Survey berhasil disimpan dengan ID: ' . $survey->id);
    
            // Redirect ke halaman permohonan setelah survey selesai
            return redirect()->route('permohonan.index')->with('success', 'Survey berhasil disimpan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validasi gagal:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan survey:', ['message' => $e->getMessage()]);
            return back()->with('error', 'Gagal menyimpan survey. Silakan coba lagi.')->withInput();
        }
    }



    // Menampilkan form untuk edit survey
    public function edit($id)
    {
        $survey = Survey::findOrFail($id); // Mengambil survey berdasarkan id
        return view('survey.edit', compact('survey'));
    }

    // Update survey
    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'question_1' => 'required|string',
            'question_2' => 'required|string',
            'question_3' => 'required|string',
            'question_4' => 'required|string',
            'question_5' => 'required|string',
            'question_6' => 'required|string',
            'question_7' => 'required|string',
            'question_8' => 'required|string',
            'question_9' => 'required|string',
            'question_10' => 'required|string',
            'saran' => 'nullable|string',
        ]);

        $survey = Survey::findOrFail($id); // Mengambil survey berdasarkan id
        $survey->update($validatedData); // Update survey dengan data yang divalidasi

        return redirect()->route('survey.index')->with('success', 'Survey berhasil diperbarui.');
    }

    // Menampilkan detail survey
    public function show($id)
    {
        $survey = Survey::findOrFail($id); // Mengambil survey berdasarkan id
        return view('survey.show', compact('survey'));
    }

    // Menghapus survey
    public function destroy($id)
    {
        $survey = Survey::findOrFail($id); // Mengambil survey berdasarkan id
        $survey->delete(); // Menghapus survey

        return redirect()->route('survey.index')->with('success', 'Survey berhasil dihapus.');
    }


    

    // Metode lainnya
}


