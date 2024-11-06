@extends('template.main')

@section('content')

<div class="p-6">
    <h1 class="font-poppins font-bold text-2xl">Detail User</h1>
</div>

<div class="px-2 py-1">
    <div class="bg-white rounded-md border border-gray-600 shadow-lg p-6">
        <div class="space-y-6">
            <div class="mb-4">
                <label class="font-medium">Photo Profile:</label>
                @if($user->photo) <!-- Menampilkan foto jika ada -->
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="mt-1 w-32 h-32 object-cover rounded-full" />
                @else
                    <p class="text-gray-700">Tidak ada foto profil</p>
                @endif
            </div>
            <div class="mb-4">
                <label class="font-medium">Nama Lengkap:</label>
                <p class="text-gray-700">{{ $user->name }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Email:</label>
                <p class="text-gray-700">{{ $user->email }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Role:</label>
                <p class="text-gray-700">{{ $user->role == 'user' ? 'Pemohon' : 'Admin' }}</p>
            </div>            
            <div class="mb-4">
                <label class="font-medium">Waktu Dibuat:</label>
                <p class="text-gray-700">{{ $user->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div class="mb-4">
                <label class="font-medium">Waktu Diperbarui:</label>
                <p class="text-gray-700">{{ $user->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
        <div class="mt-6 flex justify-start">
            <a class="bg-blue-500 p-2 pl-7 pr-7 hover:bg-blue-800 duration-200 text-white font-bold rounded-md" href="{{ route('user.index') }}">Kembali</a>
        </div>
    </div>
</div>

@endsection
