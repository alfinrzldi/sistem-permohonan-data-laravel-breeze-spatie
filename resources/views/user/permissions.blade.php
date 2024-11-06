@extends('template.main')

@section('content')
<div class="p-6">
    <h1 class="font-poppins font-bold text-xl">Kelola Permission</h1>
    <p class="font-poppins text-gray-400">Pengelolaan permissions untuk {{ $user->name }}</p>

    <form action="{{ route('user.updatePermissions', $user->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="mt-4">
            @foreach($permissions as $permission)
                <div class="flex items-center">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                           @if($user->hasPermissionTo($permission->name)) checked @endif>
                    <label class="ml-2">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="mt-4 bg-blue-700 text-white px-4 py-2 rounded">Update Permissions</button>
    </form>
</div>
@endsection
