@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Manajemen User</h1>
    <p class="font-poppins text-gray-400">Edit akun pengguna</p>
</div>
<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <h1 class="font-semibold text-xl mb-4">Edit Akun</h1>
        <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request PUT -->
            <fieldset>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Nama Lengkap
                    </span>
                    <input id="name" type="text" required name="name" value="{{ old('name', $user->name) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Lengkap" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Email
                    </span>
                    <input id="email" required type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Email" />
                </label> 
                {{-- <label for="role" class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Role
                    </span>
                    <select name="role" id="role" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" required>
                        <option value="" disabled>Pilih Role</option> <!-- Opsi default -->
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" 
                                {{ $role->name == $user->role ? 'selected' : '' }} 
                                {{ $role->name == 'super-admin' ? 'disabled' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </label>
                 --}}
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                      Password
                    </span>
                    <input id="password" type="password" name="password" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Password (Kosongkan jika tidak ingin mengubah)" />
                </label>
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Konfirmasi Password
                    </span>
                    <input id="password-confirmation" type="password" name="password_confirmation" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Konfirmasi Password (Kosongkan jika tidak ingin mengubah)" />
                </label>                
                <input type="submit" value="Perbarui" class="font-bold w-20 h-10 mt-1 px-3 py-2 bg-blue-800 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
            </fieldset>
        </form>
    </div>
</div>
@endsection
