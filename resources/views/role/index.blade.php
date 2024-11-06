@extends('template.main')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-6">Kelola Role</h2>
    
    <!-- Tambah Role Baru -->
    <div class="mb-6">
        <a href="{{ route('role.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tambah Role
        </a>
    </div>
    
    <!-- Daftar Role -->
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="px-4 py-2 border">Nama Role</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="px-4 py-2 border">{{ $role->name }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('role.edit', $role->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        |
                        <form action="{{ route('role.destroy', $role->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus role ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
