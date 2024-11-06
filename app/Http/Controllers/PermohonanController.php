<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use App\Models\Survey;
use App\Notifications\PermohonanSelesaiNotification;
use Illuminate\Support\Facades\Notification;


class PermohonanController extends Controller
{
    // Method untuk menampilkan daftar permohonan (index)
    public function index(Request $request)
{
    // Mengambil pengguna yang sedang login
    $user = Auth::user();

    // Cek apakah ada permohonan yang berkaitan dengan user dan sudah ada file_upload
    $permohonan = Permohonan::where('email', $user->email)->first();

    // if ($permohonan && $permohonan->file_upload) {
    //     // Cek apakah user sudah mengisi survey
    //     $survey = Survey::where('user_id', $user->id)->first();
    
    //     if (!$survey) {
    //         // Jika user belum mengisi survey, arahkan ke halaman survey
    //         return redirect()->route('survey.index', ['permohonan' => $permohonan->id])->with('info', 'Silakan isi survey sebelum melanjutkan.');
    //     }
    // }
    

    // Inisialisasi query untuk permohonan
    $query = Permohonan::query();

    // Cek jika pengguna adalah pemohon
    if ($user->role == 'pemohon') {
        // Mengambil permohonan berdasarkan email pengguna yang login
        $query->where('email', $user->email);
    }

    // Tambahkan filter berdasarkan status jika ada
    if ($request->has('status') && !empty($request->status)) {
        $query->where('status', $request->status);
    }

    // Ambil data permohonan
    $permohonan = $query->get();

    return view('permohonan.index', compact('permohonan'));
}

    



    // Method untuk menampilkan form create
    public function create()
    {
        return view('permohonan.create');
    }

    // Method untuk menyimpan data permohonan
    public function store(Request $request)
    {

        // dd($request->all());

        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'nomor_iden' => 'required',
            'alamat' => 'required',
            'telephone' => 'required',
            'pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'rincian_informasi' => 'required|string',
            'jenis_informasi' => 'nullable|array',
            'informasi_lainnya' => 'nullable|string',
            'tujuan_penggunaan' => 'nullable|array',
            'tujuan_lainnya' => 'nullable|string',
            'file_identitas' => 'required|file',
            'waktu_selesai' => 'nullable|date', // Buat waktu_selesai menjadi opsional
        ]);
        

        // Proses array checkbox menjadi string
    $jenis_informasi = isset($request->jenis_informasi) ? implode(',', $request->jenis_informasi) : '';
    $tujuan_penggunaan = isset($request->tujuan_penggunaan) ? implode(',', $request->tujuan_penggunaan) : '';

        // Proses file upload
        if ($request->hasFile('file_identitas')) {
            $path = $request->file('file_identitas')->store('identitas', 'public');
        } else {
            $path = null;
        }

        // Simpan data ke database
        $permohonan = new Permohonan();
        $permohonan->nama_lengkap = $request->nama_lengkap;
        $permohonan->email = $request->email;
        $permohonan->nomor_iden = $request->nomor_iden;
        $permohonan->alamat = $request->alamat;
        $permohonan->telphone = $request->telephone;
        $permohonan->pekerjaan = $request->pekerjaan;
        $permohonan->nama_perusahaan = $request->nama_perusahaan;
        $permohonan->alamat_perusahaan = $request->alamat_perusahaan;
        $permohonan->jenis_informasi = $jenis_informasi; // Hasil implode
        $permohonan->informasi_lainnya = $request->informasi_lainnya;
        $permohonan->rincian_informasi = $request->rincian_informasi;
        $permohonan->tujuan_penggunaan = $tujuan_penggunaan; // Hasil implode
        $permohonan->tujuan_lainnya = $request->tujuan_lainnya;
        $permohonan->file_identitas = $path; // Path file yang disimpan
        $permohonan->waktu_selesai = $request->waktu_selesai; // Simpan waktu_selesai
        $permohonan->save();

         // Redirect ke halaman indeks setelah berhasil
    return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil dikirim!');
    }

    // Method untuk menampilkan detail permohonan
    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        $user = Auth::user();

         // Cek apakah pengguna adalah 'pemohon' dan email tidak cocok
     if ($user->role == 'pemohon' && $permohonan->email !== $user->email) {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mendownload file ini.');
    }   

        return view('permohonan.show', compact('permohonan'));
    }

    // Method untuk menghapus permohonan
    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // Hapus file yang terkait dari storage
        if ($permohonan->file_identitas) {
            Storage::disk('public')->delete($permohonan->file_identitas);
        }
        if ($permohonan->file_upload) {
            Storage::disk('public')->delete($permohonan->file_upload);
        }

        $permohonan->delete();
        return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil dihapus.');
    }


    public function updateStatus($id, $status)
{
    $permohonan = Permohonan::find($id);
    if (!$permohonan) {
        return redirect()->back()->with('error', 'Permohonan tidak ditemukan.');
    }

    $permohonan->status = $status;
    $permohonan->save();

    return redirect()->back()->with('success', 'Status permohonan berhasil diubah.');
}

// Method untuk menampilkan form edit
public function edit($id)
{
    $permohonan = Permohonan::findOrFail($id);
    return view('permohonan.edit', compact('permohonan'));
}

// Method untuk memperbarui data permohonan
public function update(Request $request, $id)
{
    $permohonan = Permohonan::findOrFail($id);

    // Validasi input (sama dengan saat menyimpan)
    $request->validate([
        'nama_lengkap' => 'required|string',
        'email' => 'required|email|unique:permohonan,email,' . $permohonan->id,
        // Validasi lainnya sesuai kebutuhan
    ]);

    // Update permohonan
    $permohonan->update($request->all());

    return redirect()->route('permohonan.index')->with('success', 'Permohonan berhasil diperbarui.');
}

public function uploadForm($id)
{
    // Temukan permohonan berdasarkan ID
    $permohonan = Permohonan::findOrFail($id);

    // Tampilkan halaman upload dan kirimkan data permohonan
    return view('permohonan.upload', compact('permohonan'));
}

public function upload(Request $request, $id)
{
    // Temukan permohonan berdasarkan ID
    $permohonan = Permohonan::findOrFail($id);

    // Validasi file yang akan diupload
    $request->validate([
        'upload_data' => 'required|file|max:2048', // Mengizinkan semua tipe file
    ]);

    // Proses file upload
    if ($request->hasFile('upload_data')) {
        // Simpan file di direktori 'public/uploads'
        $path = $request->file('upload_data')->store('uploads', 'public');

        // Simpan path file yang diupload ke dalam database
        $permohonan->file_upload = $path;
        $permohonan->save();

        return redirect()->route('permohonan.index')->with('success', 'File berhasil diupload.');
    }

    return redirect()->back()->with('error', 'File gagal diupload.');
}





public function download($id)
{
    // Temukan permohonan berdasarkan ID permohonan
    $permohonan = Permohonan::findOrFail($id); // Menggunakan findOrFail untuk mencari berdasarkan ID

    $user = Auth::user();

     // Cek apakah pengguna adalah 'pemohon' dan email tidak cocok
     if ($user->role == 'pemohon' && $permohonan->email !== $user->email) {
        return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk mendownload file ini.');
    }   

    // Path ke file yang ingin di-download
    $filePath = storage_path('app/public/' . $permohonan->file_upload); // Pastikan file berada di kolom file_upload

    // Mengirim file ke browser untuk di-download
    return response()->download($filePath);
}




    public function survey()
{
    // Logika untuk menampilkan survey
    return view('permohonan.survey');
}

}
