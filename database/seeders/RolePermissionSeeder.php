<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-permohonan']);
        Permission::create(['name'=>'edit-permohonan']);
        Permission::create(['name'=>'hapus-permohonan']);
        Permission::create(['name'=>'lihat-permohonan']);
        
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'pemohon']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        
        $rolePenulis = Role::findByName('pemohon');
        $rolePenulis->givePermissionTo('tambah-permohonan');
        $rolePenulis->givePermissionTo('edit-permohonan');
        $rolePenulis->givePermissionTo('hapus-permohonan');
        $rolePenulis->givePermissionTo('lihat-permohonan');
    }
}
