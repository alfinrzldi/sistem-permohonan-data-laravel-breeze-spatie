<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
{
    // Ambil semua pengguna yang bukan super-admin
    $users = User::whereHas('roles', function ($query) {
        $query->where('name', '!=', 'super-admin'); // Menghindari super-admin
    })->get();

    return view('user.index', compact('users'));
}


    // Menampilkan form untuk membuat user baru
    public function create()
{
    $roles = Role::where('name', '!=', 'super-admin')->get(); // Mengambil semua role kecuali super-admin
    return view('user.create', compact('roles'));
}


    // Metode untuk menyimpan data user
    public function store(Request $request)
    {
        // Validasi data termasuk role
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'role' => 'required' // Pastikan role disertakan
        ]);

        // Membuat user baru dengan data validasi
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Enkripsi password
        ]);

        // Menetapkan role kepada user
        $user->assignRole($request->role); // Menetapkan role berdasarkan input form

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    // Menampilkan form untuk edit user
    public function edit($id)
{
    $user = User::findOrFail($id); // Menemukan pengguna berdasarkan ID
    $roles = Role::where('name', '!=', 'super-admin')->get(); // Mengambil semua role kecuali super-admin
    return view('user.edit', compact('user', 'roles'));
}


    // Update user
    public function update(Request $request, $id)
    {
        // Validasi data, termasuk role
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|confirmed', // Validasi password, hanya jika diisi
            'role' => 'required' // Validasi role
        ]);

        $user = User::findOrFail($id);

        // Update password jika diisi
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password); // Enkripsi password baru
        } else {
            unset($validatedData['password']); // Hapus password dari data yang akan diupdate jika tidak diisi
        }

        // Update data user
        $user->update($validatedData);

        // Update role user
        $user->syncRoles($request->role); // Mengubah role user

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    // Menampilkan detail user
    public function show($id)
    {
        $user = User::findOrFail($id); // Mengambil user berdasarkan id
        return view('user.show', compact('user'));
    }

    // Menghapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    // Menampilkan form untuk kelola permissions
    public function permissions($id)
    {
        $user = User::findOrFail($id);
        $permissions = Permission::all();
        return view('user.permissions', compact('user', 'permissions'));
    }

    // Update permissions untuk user tertentu
    public function updatePermissions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncPermissions($request->permissions);

        return redirect()->route('user.index')->with('success', 'Permission updated successfully.');
    }
}
