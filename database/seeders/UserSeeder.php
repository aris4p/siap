<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'namadepan' => 'Aris',
            'namabelakang' => 'Anggara Putra',
            'email'=> 'admin@gmail.com',
            'nohp'=> '089674761189',
            'alamat'=> 'sawah dalam',
            'kota'=> 'Tangerang',
            'role'=> 'admin',
            'password'=> bcrypt('traine123'),
        ]);
        $admin->assignRole('admin');

        $apoteker = User::create([
            'namadepan' => 'Adeline',
            'namabelakang' => 'Angel Maulidna',
            'email'=> 'apotoker@gmail.com',
            'nohp'=> '087777565854',
            'alamat'=> 'Jonggol',
            'kota'=> 'Bogor',
            'role'=> 'apoteker',
            'password'=> bcrypt('traine123'),
        ]);
        $apoteker->assignRole('apoteker');
    }
}
