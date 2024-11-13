@extends('template.main')

@section('content')


<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6 w-full max-w-full mx-auto">
        <h2 class="font-semibold text-xl mb-4">Tambahkan Admin</h2>

        <form method="post" action="{{ route('user.create_admin') }}">
            @csrf
            <fieldset>
                <!-- Email -->
                <label class="block mb-6">
                    <span class="mb-2 after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-poppins text-slate-700">
                        Email
                    </span>
                    <input id="email" type="email" name="email" required class="mt-1 px-3 py-2 bg-gray-100 border shadow-sm border-slate-200 placeholder-slate-400 focus:outline-none focus:border-gray-300 focus:ring-gray-300 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukkan Email Pengguna" />
                </label>

                <!-- Submit Button -->
                <input type="submit" value="Update" class="font-bold w-full h-10 mt-1 px-3 py-2 bg-blue-800 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
            </fieldset>
        </form>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mt-4 p-4 bg-red-100 text-red-700 border border-red-400 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
