@extends('template.main')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-6">Edit Role dan Permissions</h2>
    
    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Nama Role -->
        <div class="mb-4">
            <label class="block text-gray-700">Nama Role</label>
            <input type="text" name="name" value="{{ $role->name }}" class="w-full border px-3 py-2 rounded" required>
        </div>
        
        <!-- Daftar Permissions -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Permissions</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($permissions as $permission)
                    <div>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                               {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                        <span class="ml-2">{{ $permission->name }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
