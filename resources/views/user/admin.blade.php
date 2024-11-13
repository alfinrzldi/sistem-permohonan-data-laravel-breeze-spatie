@extends('template.main')

@section('content')

<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Manajemen Admin</h1>
    <p class="font-poppins text-gray-400">Pengelolaan data pengguna dengan role admin pada sistem</p>
</div>

<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-black/5 p-6">
        <!-- Tampilkan hanya jika user adalah super-admin -->
        @if(auth()->user()->hasRole('super-admin'))
            <a href="{{ route('user.create_admin') }}" class="font-medium text-center w-40 h-10 mb-6 px-3 py-2 bg-blue-700 border shadow-sm border-blue-800 block rounded-md sm:text-sm text-white hover:bg-blue-900 hover:text-white">
                Tambah Admin
            </a>
        @endif
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 mt-5" id="myTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        @if($user->hasRole('admin'))
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Edit: Tampilkan hanya untuk super-admin -->
                                    @if(auth()->user()->hasRole('super-admin'))
                                        <a href="{{ route('user.edit', $user->id) }}" class="text-amber-600 hover:underline">
                                            <i class="ri-edit-2-line"></i> Edit
                                        </a>
                                    @endif
                                    <br>
                                    <a href="{{ route('user.show', $user->id) }}" class="text-stone-700 hover:underline">
                                        <i class="ri-eye-line"></i> Detail
                                    </a>
                                    <br>
                                    <!-- Hapus: Tampilkan hanya untuk super-admin -->
                                    @if(auth()->user()->hasRole('super-admin'))
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">
                                                <i class="ri-delete-bin-line"></i> Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach                
                </tbody>                
            </table>
        </div>
    </div>
</div>

@endsection
