@extends('template.main')

@section('content')
    
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Permohonan Data</h1>
    <p class="font-poppins text-gray-400">Permohonan data balai wilayah sungai Kalimantan III Banjarmasin</p>
</div>
<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <h1 class="font-poppins font-bold text-2xl text-gray-800 mb-2">Upload Permohonan Informasi Publik</h1>
        <p class="font-poppins text-gray-500 mb-4">Silakan unggah data Anda di sini:</p>
        
        <!-- Form untuk Upload -->
        <form action="{{ route('permohonan.upload', $permohonan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" 
                   type="file" 
                   id="upload_data" 
                   name="upload_data" required>
            <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-poppins font-semibold py-2 rounded hover:bg-blue-600 transition duration-200">
                Unggah
            </button>
        </form>
    </div>
</div>

@endsection
