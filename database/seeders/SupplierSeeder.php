<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'kodesupplier' => 'SP001',
            'namasupplier' => 'PT. Kimia Farma',
            'nosupplier' => '089674761189',
            'alamatsupplier' => 'Jl HR Rasuna said no 97',
            'kota' => 'Tangerang',
            'provinsi' => 'Banten',
            'kodepos' => 15143,
            'negara' => 'Indonesia',
            
        ]);
    }
}
