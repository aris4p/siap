<?php

namespace Database\Seeders;

use App\Models\Obats;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class obatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obats::create([
            'kodeObat' => 'OB001',
            'namaObat' => 'Parasetamol',
            'jenisObat' => 'Analgesik',
            'dosisObat' => 500,
            'deskripsiObat' => 'Obat pereda nyeri dan penurun panas.',
            'satuandosisObat' => 'mg',
            'hargajualObat' => 5.99,
            'hargabeliObat' => 2.50,
            'stokObat' => 100,
            'kategoriObat' => 'Obat Umum',
            'gambarObat' => 'paracetamol.jpg',
            'tanggalkadaluarsaObat' => '2024-12-31',
        ]);

        Obats::create([
            'kodeObat' => 'OB002',
            'namaObat' => 'Amoksisilin',
            'jenisObat' => 'Antibiotik',
            'dosisObat' => 250,
            'deskripsiObat' => 'Antibiotik untuk infeksi bakteri.',
            'satuandosisObat' => 'mg',
            'hargajualObat' => 9.99,
            'hargabeliObat' => 4.50,
            'stokObat' => 50,
            'kategoriObat' => 'Obat Resep',
            'gambarObat' => 'amoxicillin.jpg',
            'tanggalkadaluarsaObat' => '2023-11-30',
        ]);

    }
}
