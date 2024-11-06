@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Kelola Permission</h1>
    <p class="font-poppins text-gray-400">Kelola semua permission untuk role yang tersedia</p>
</div>

<div class="px-6 py-2">
    <div class="bg-white rounded-md border border-gray-100 shadow-sm p-6">
        <h2 class="font-semibold text-xl mb-4">Daftar Permission</h2>
        
        <!-- Tombol Tambah Permission -->
        <div class="mb-4">
            <a href="{{ route('permission.create') }}" class="px-6 py-2 bg-blue-800 text-white rounded-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Tambah Permission
            </a>
        </div>

        <!-- Tabel Daftar Permissions -->
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Permission</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $permission->name }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('permission.edit', $permission->id) }}" class="text-blue-600 hover:text-blue-800 mr-4">
                                    Edit
                                </a>
                                <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permission ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
