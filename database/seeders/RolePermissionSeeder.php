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

        Permission::create(['name'=>'tambah-obat']);
        Permission::create(['name'=>'edit-obat']);
        Permission::create(['name'=>'hapus-obat']);
        Permission::create(['name'=>'lihat-obat']);

        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'apoteker']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleApoteker = Role::findByName('apoteker');
        $roleApoteker->givePermissionTo('tambah-obat');
        $roleApoteker->givePermissionTo('edit-obat');
        $roleApoteker->givePermissionTo('hapus-obat');
        $roleApoteker->givePermissionTo('lihat-obat');
    }
}
