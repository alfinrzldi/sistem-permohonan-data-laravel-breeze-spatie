<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('permission.index')->with('success', 'Permission berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->only('name'));

        return redirect()->route('permission.index')->with('success', 'Permission berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

        return redirect()->route('permission.index')->with('success', 'Permission berhasil dihapus.');
    }
}
