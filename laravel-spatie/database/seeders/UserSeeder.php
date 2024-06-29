<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        //! Memberikan Role Admin
        $admin->assignRole('admin');

        $penulis = User::create([
            'name' => 'author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('password'),
        ]);

        //! Memberikan Role penulis
        $penulis->assignRole('author');
    }
}
