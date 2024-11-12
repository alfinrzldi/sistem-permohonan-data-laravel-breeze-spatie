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

        Permission::create(['name'=>'tambah-role']);
        Permission::create(['name'=>'edit-role']);
        Permission::create(['name'=>'hapus-role']);

        Permission::create(['name'=>'tambah-permission']);
        Permission::create(['name'=>'edit-permission']);
        Permission::create(['name'=>'hapus-permission']);

        
        Role::create(['name'=>'super-admin']);


        $rolesuperAdmin = Role::findByName('super-admin');
        $rolesuperAdmin->givePermissionTo('tambah-user');
        $rolesuperAdmin->givePermissionTo('edit-user');
        $rolesuperAdmin->givePermissionTo('hapus-user');
        $rolesuperAdmin->givePermissionTo('lihat-user');
        $rolesuperAdmin->givePermissionTo('tambah-permohonan');
        $rolesuperAdmin->givePermissionTo('edit-permohonan');
        $rolesuperAdmin->givePermissionTo('lihat-permohonan');
        $rolesuperAdmin->givePermissionTo('hapus-permohonan');
        $rolesuperAdmin->givePermissionTo('tambah-role');
        $rolesuperAdmin->givePermissionTo('edit-role');
        $rolesuperAdmin->givePermissionTo('hapus-role');
        $rolesuperAdmin->givePermissionTo('tambah-permission');
        $rolesuperAdmin->givePermissionTo('edit-permission');
        $rolesuperAdmin->givePermissionTo('hapus-permission');

        
    }
}
