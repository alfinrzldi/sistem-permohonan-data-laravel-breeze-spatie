<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        // Ambil semua role kecuali 'super-admin'
        $roles = Role::where('name', '!=', 'super-admin')->get();
    
        return view('role.index', compact('roles'));
    }
    

    public function create()
{
    // Ambil semua permission yang ada
    $permissions = Permission::all();
    return view('role.create', compact('permissions'));
}


public function store(Request $request)
{
    // Validasi input nama role
    $request->validate(['name' => 'required|unique:roles']);

    // Buat role baru
    $role = Role::create(['name' => $request->name]);

    // Cek apakah ada permissions yang dikirimkan
    if ($request->has('permissions')) {
        // Ambil nama permissions berdasarkan ID yang dipilih
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();

        // Kaitkan permissions dengan role
        $role->syncPermissions($permissions);
    }

    return redirect()->route('role.index')->with('success', 'Role dan permissions berhasil ditambahkan');
}


public function edit($id)
{
    $role = Role::findOrFail($id);
    $permissions = Permission::all();
    $rolePermissions = $role->permissions->pluck('id')->toArray();

    return view('role.edit', compact('role', 'permissions', 'rolePermissions'));
}

public function update(Request $request, $id)
{
    $request->validate(['name' => 'required|unique:roles,name,'.$id]);

    $role = Role::findOrFail($id);
    $role->update(['name' => $request->name]);

    // Ambil nama permission berdasarkan ID yang dipilih
    $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
    
    // Sinkronkan permissions dengan nama permission
    $role->syncPermissions($permissions);

    return redirect()->route('role.index')->with('success', 'Role dan permissions berhasil diperbarui');
}


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus');
    }
}
