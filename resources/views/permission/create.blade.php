@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Tambah Permission</h1>
    <p class="font-poppins text-gray-400">Buat permission baru untuk role tertentu</p>
</div>

<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <form action="{{ route('permission.store') }}" method="POST">
            @csrf
            <label class="block mb-4">
                <span class="text-sm font-poppins text-slate-700">Nama Permission</span>
                <input type="text" name="name" class="mt-1 px-3 py-2 w-full border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300" placeholder="Masukkan Nama Permission" required>
            </label>
            <button type="submit" class="px-4 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900">Tambah Permission</button>
        </form>
    </div>
</div>
@endsection
