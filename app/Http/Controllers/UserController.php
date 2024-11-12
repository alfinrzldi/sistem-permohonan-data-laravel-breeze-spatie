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
        $permissions = Permission::all(); // Fetching all permissions from the database

        return view('user.create', compact('roles', 'permissions'));
    }

    // Menampilkan form untuk membuat admin baru
    public function create_admin()
    {
        $roles = Role::where('name', 'admin')->get(); // Mengambil role 'admin'
        $permissions = Permission::all(); // Mengambil semua permissions

        return view('user.create_admin', compact('roles', 'permissions'));
    }

    // Metode untuk menyimpan data user
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Assign role
        $role = Role::findByName($request->role);
        $user->assignRole($role);

        // Assign permissions jika ada
        if ($request->has('permissions')) {
            $permissions = Permission::whereIn('name', $request->permissions)->get();
            $user->givePermissionTo($permissions);
        }

        // Redirect sesuai dengan role yang dipilih
        if ($request->role === 'admin') {
            return redirect()->route('user.admin')->with('success', 'Admin berhasil dibuat dengan role dan permission.');
        } else {
            return redirect()->route('user.index')->with('success', 'User berhasil dibuat dengan role dan permission.');
        }
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
            'role' => 'required|string|exists:roles,name' // Validasi role
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

        // Redirect sesuai role yang dipilih
        if ($request->role === 'admin') {
            return redirect()->route('user.admin')->with('success', 'Admin berhasil diperbarui.');
        } else {
            return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
        }
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
        
        // Simpan role sebelum dihapus
        $role = $user->getRoleNames()->first();
        
        // Hapus pengguna
        $user->delete();

        // Redirect sesuai role
        if ($role === 'admin') {
            return redirect()->route('user.admin')->with('success', 'Admin berhasil dihapus.');
        } else {
            return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
        }
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

    public function admin()
    {
        // Ambil semua pengguna
        $users = User::all();

        // Kirim data pengguna ke view admin.blade.php
        return view('user.admin', compact('users'));
    }
}
