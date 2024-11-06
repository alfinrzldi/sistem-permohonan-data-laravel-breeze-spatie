@extends('template.main')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-6">Tambah Role Baru</h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('role.store') }}" method="POST">
        @csrf

        <!-- Nama Role -->
        <div class="mb-4">
            <label class="block text-gray-700">Nama Role</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
        </div>

        <!-- Permissions -->
        <div class="mb-4">
            <label class="block text-gray-700">Permissions</label>
            <div class="grid grid-cols-3 gap-2 mt-2">
                @foreach ($permissions as $permission)
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-checkbox">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Simpan
        </button>
    </form>
</div>
@endsection
