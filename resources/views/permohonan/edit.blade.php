@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Form Edit Permohonan Data</h1>
    <p class="font-poppins text-gray-400">Diharapkan user mengisi data dengan lengkap</p>
</div>
<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <form method="post" action="{{ route('permohonan.update', $permohonan->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>
                <h1 class="font-bold text-xl mb-4">Detail Data Diri</h1>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Nama Lengkap
                    </span>
                    <input type="text" required name="nama_lengkap" value="{{ old('nama_lengkap', $permohonan->nama_lengkap) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Lengkap" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Email
                    </span>
                    <input id="email" required type="email" name="email" value="{{ old('email', $permohonan->email) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Email" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Nomor Identitas (NIK/KTP/Paspor)
                    </span>
                    <input type="text" required name="nomor_iden" value="{{ old('nomor_iden', $permohonan->nomor_iden) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nomor Identitas (NIK/KTP/Paspor)" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                     Alamat Rumah
                    </span>
                    <input type="text" required name="alamat" value="{{ old('alamat', $permohonan->alamat) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Alamat Rumah" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Nomor Telephone (WA)
                    </span>
                    <input type="text" required name="telphone" value="{{ old('telphone', $permohonan->telphone) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nomor Telephone (WA)" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Pekerjaan
                    </span>
                    <input type="text" required name="pekerjaan" value="{{ old('pekerjaan', $permohonan->pekerjaan) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Pekerjaan" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Upload Identitas
                    </span>
                    <input type="file" name="file_identitas" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Nama Perusahaan
                    </span>
                    <input type="text" required name="nama_perusahaan" value="{{ old('nama_perusahaan', $permohonan->nama_perusahaan) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Perusahaan" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Alamat Perusahaan
                    </span>
                    <input type="text" required name="alamat_perusahaan" value="{{ old('alamat_perusahaan', $permohonan->alamat_perusahaan) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Alamat Perusahaan" />
                </label>

                <h1 class="font-bold text-xl mb-4">Permohonan Data</h1>
                <label class="block mb-6">
                    <span class="mb-2 block text-sm font-poppins text-slate-700">
                        Jenis tujuan yang Dibutuhkan
                    </span>
                </label>
                
                <div class="space-y-2 mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="data_curah_hujan" name="jenis_tujuan[]" value="Data Curah Hujan" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Data Curah Hujan', old('jenis_tujuan', (array) $permohonan->jenis_tujuan) ?: []) ? 'checked' : '' }}>
                        <label for="data_curah_hujan" class="ml-2 font-poppins text-sm text-slate-700">Data Curah Hujan</label>
                    </div>
                
                    <div class="flex items-center">
                        <input type="checkbox" id="profil_sungai" name="jenis_tujuan[]" value="Profil Sungai" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Profil Sungai', old('jenis_tujuan', (array) $permohonan->jenis_tujuan) ?: []) ? 'checked' : '' }}>
                        <label for="profil_sungai" class="ml-2 font-poppins text-sm text-slate-700">Profil Sungai</label>
                    </div>
                
                    <div class="flex items-center">
                        <input type="checkbox" id="topografi" name="jenis_tujuan[]" value="Topografi" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Topografi', old('jenis_tujuan', (array) $permohonan->jenis_tujuan) ?: []) ? 'checked' : '' }}>
                        <label for="topografi" class="ml-2 font-poppins text-sm text-slate-700">Topografi</label>
                    </div>
                
                    <div class="flex items-center">
                        <input type="checkbox" id="studi" name="jenis_tujuan[]" value="Studi/Kajian" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Studi/Kajian', old('jenis_tujuan', (array) $permohonan->jenis_tujuan) ?: []) ? 'checked' : '' }}>
                        <label for="studi" class="ml-2 font-poppins text-sm text-slate-700">Studi/Kajian</label>
                    </div>
                
                    <div class="flex items-center">
                        <input type="checkbox" id="alokasi" name="jenis_tujuan[]" value="Alokasi Air" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Alokasi Air', old('jenis_tujuan', (array) $permohonan->jenis_tujuan) ?: []) ? 'checked' : '' }}>
                        <label for="alokasi" class="ml-2 font-poppins text-sm text-slate-700">Alokasi Air</label>
                    </div>
                
                    <div class="flex items-center">
                        <input type="text" name="tujuan_lainnya" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" 
                        value="{{ old('tujuan_lainnya', $permohonan->tujuan_lainnya) }}" />
                    </div>
                </div>
                
                <h1 class="font-bold text-xl mb-4">Permohonan Data</h1>
                
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Rincian tujuan yang Dibutuhkan
                    </span>
                    <input type="text" required name="rincian_informasi" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" 
                    value="{{ old('rincian_informasi', $permohonan->rincian_informasi) }}" />
                </label>
                
                <label class="block mb-3">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Tujuan Penggunaan tujuan
                    </span>
                </label>
                
                <div class="space-y-2 mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="tujuan_penelitian" name="tujuan_penggunaan[]" value="Penelitian" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Penelitian', old('tujuan_penggunaan', (array) $permohonan->tujuan_penggunaan) ?: []) ? 'checked' : '' }}>
                        <label for="tujuan_penelitian" class="ml-2 font-poppins text-sm text-slate-700">Untuk Penelitian/Tugas Akhir/Tesis dan sejenisnya</label>
                    </div>
                
                    <div class="flex items-center">
                        <input type="checkbox" id="tujuan_studi" name="tujuan_penggunaan[]" value="Studi/Kajian/Proyek" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" 
                        {{ in_array('Studi/Kajian/Proyek', old('tujuan_penggunaan', (array) $permohonan->tujuan_penggunaan) ?: []) ? 'checked' : '' }}>
                        <label for="tujuan_studi" class="ml-2 font-poppins text-sm text-slate-700">Untuk Studi/Kajian/Proyek</label>
                    </div>
                
                    <input type="text" name="tujuan_lainnya" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" 
                    value="{{ old('tujuan_lainnya', $permohonan->tujuan_lainnya) }}" />
                </div>
                
                {{-- <label class="block mb-6">
                    <span class="mb-2 block text-sm font-poppins text-slate-700">
                        Waktu Selesai
                    </span>
                    <input type="datetime-local" name="waktu_selesai" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1"
                    value="{{ old('waktu_selesai', $permohonan->waktu_selesai ? date('Y-m-d\TH:i', strtotime($permohonan->waktu_selesai)) : '') }}" />
                </label> --}}
                
                
                <button type="submit" class="font-bold w-20 h-10 mt-1 px-3 py-2 bg-blue-800 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
                    Kirim
                </button>                
                </fieldset>
            </form>
        </div>
    </div>
    @endsection