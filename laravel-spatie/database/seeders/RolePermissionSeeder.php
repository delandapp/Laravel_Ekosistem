<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    //! Permission
    //? tambah-user, tambah-tulisan, edit-tulisan, hapus-tulisan
    //! Role
    //? admin, author

    // TODO : contoh
    //? admin : tambah-user, tambah-tulisan, edit-tulisan, hapus-tulisan
    //? author : edit-tulisan, hapus-tulisan

    // TODO : kita bisa memberikan permission tanpa harus memberi role
    //? anton : author
    //? deland : tambah-user, tambah-tulisan
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //* (!) Pilih Permission yang use Models bukan yang lain
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-tulisan']);
        Permission::create(['name' => 'edit-tulisan']);
        Permission::create(['name' => 'hapus-tulisan']);
        Permission::create(['name' => 'lihat-tulisan']);

        //* (!) Pilih Role yang use Models bukan yang lain
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);

        //* (!) Memasukan Permission Ke Role
        $roleAdmin = Role::findByName('admin');

        //? (?) Memasukan Permission ke Role admin
        $roleAdmin->givePermissionTo([
            'tambah-user',
            'edit-user',
            'hapus-user',
            'lihat-user',
        ]);

        $roleAuthor = Role::findByName('author');
        $roleAuthor->givePermissionTo([
            'tambah-tulisan',
            'edit-tulisan',
            'hapus-tulisan',
            'lihat-tulisan',
        ]);
    }
}
