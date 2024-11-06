@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Form Permohonan Data</h1>
    <p class="font-poppins text-gray-400">Diharapkan user mengisi data dengan lengkap</p>
</div>
<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <form method="post" action="{{ route('permohonan.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <h1 class="font-bold text-xl mb-4">Detail Data Diri</h1>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Nama Lengkap
                    </span>
                    <input type="text" required name="nama_lengkap" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Lengkap" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Email (Masukkan email yang digunakan untuk login)
                    </span>
                    <input id="email" required type="email" name="email" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Email" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Nomor Identitas (NIK/KTP/Paspor)
                    </span>
                    <input type="text" required name="nomor_iden" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nomor Identitas (NIK/KTP/Paspor)" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                     Alamat Rumah
                    </span>
                    <input type="text" required name="alamat" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Alamat Rumah" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Nomor Telephone (WA)
                    </span>
                    <input type="text" required name="telephone" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nomor Telephone (WA)" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Pekerjaan
                    </span>
                    <input type="text" required name="pekerjaan" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Pekerjaan" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Upload Identitas
                    </span>
                    <input type="file" required name="file_identitas" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Nama Perusahaan
                    </span>
                    <input type="text" required name="nama_perusahaan" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Perusahaan" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Alamat Perusahaan
                    </span>
                    <input type="text" required name="alamat_perusahaan" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Alamat Perusahaan" />
                </label>

                <h1 class="font-bold text-xl mb-4">Permohonan Data</h1>
                <label class="block mb-6">
                    <span class="mb-2 block text-sm font-poppins text-slate-700">
                        Jenis Informasi yang Dibutuhkan
                    </span>
                </label>
                <div class="space-y-2 mb-6">
                    <div class="flex items-center">
                      <input type="checkbox" id="data_curah_hujan" name="jenis_informasi[]" value="Data Curah Hujan" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                      <label for="data_curah_hujan" class="ml-2 font-poppins text-sm text-slate-700">Data Curah Hujan</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="profil_sungai" name="jenis_informasi[]" value="Profil Sungai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                      <label for="profil_sungai" class="ml-2 font-poppins text-sm text-slate-700">Profil Sungai</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="topografi" name="jenis_informasi[]" value="Topografi" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                      <label for="topografi" class="ml-2 font-poppins text-sm text-slate-700">Topografi</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="studi" name="jenis_informasi[]" value="Studi/Kajian" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="studi" class="ml-2 font-poppins text-sm text-slate-700">Studi/Kajian</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="alokasi" name="jenis_informasi[]" value="Alokasi Air" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="alokasi" class="ml-2 font-poppins text-sm text-slate-700">Alokasi Air</label>
                    </div>
                    <input type="text" name="informasi_lainnya" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Lainnya (Opsional)" />
                </div>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Rincian Informasi yang Dibutuhkan
                    </span>
                    <input type="text" required name="rincian_informasi" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Rincian Informasi yang Dibutuhkan" />
                </label>
                <label class="block mb-3">
                    <span class="mb-2 after:content-['*'] afte  r:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Tujuan Penggunaan Informasi
                    </span>
                </label>
                <div class="space-y-2 mb-6">
                    <div class="flex items-center">
                      <input type="checkbox" id="tujuan_penelitian" name="tujuan_penggunaan[]" value="Untuk Penelitian/Tugas Akhir/Tesis dan sejenisnya" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                      <label for="tujuan_penelitian" class="ml-2 font-poppins text-sm text-slate-700">Untuk Penelitian/Tugas Akhir/Tesis dan sejenisnya</label>
                    </div>
                    <div class="flex items-center">
                      <input type="checkbox" id="tujuan_studi" name="tujuan_penggunaan[]" value="Untuk Studi/Kajian/Proyek" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                      <label for="tujuan_studi" class="ml-2 font-poppins text-sm text-slate-700">Untuk Studi/Kajian/Proyek</label>
                    </div>
                    <input type="text" name="tujuan_lainnya" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Lainnya (Opsional)" />
                </div>
                <button type="submit" class="font-bold w-20 h-10 mt-1 px-3 py-2 bg-blue-800 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
                    Kirim
                </button>
            </fieldset>
        </form>
    </div>
</div>
@endsection
