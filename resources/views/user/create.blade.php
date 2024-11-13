@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Manajemen User</h1>
    <p class="font-poppins text-gray-400">Pembuatan akun pengguna</p>
</div>

<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <h1 class="font-semibold text-xl mb-4">Buat Akun</h1>
        <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <!-- Nama Lengkap -->
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Nama Lengkap
                    </span>
                    <input id="name" type="text" required name="name" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-gray-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Nama Lengkap" />
                </label>

                <!-- Email -->
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Email
                    </span>
                    <input id="email" required type="email" name="email" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Email" />
                </label>

                  <input type="hidden" name="role" value="pemohon">

                <!-- Password -->
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Password
                    </span>
                    <input id="password" type="password" required name="password" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-3w0 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Password" />
                </label>

                <!-- Konfirmasi Password -->
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Konfirmasi Password
                    </span>
                    <input id="password-confirmation" type="password" required name="password_confirmation" class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Konfirmasi Password" />
                </label>

                <input type="submit" value="Buat" class="font-bold w-20 h-10 mt-1 px-3 py-2 bg-blue-800 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
            </fieldset>
        </form>
    </div>
</div>
@endsection
