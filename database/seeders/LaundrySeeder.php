<?php

namespace Database\Seeders;

use App\Models\Laundry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Laundry::insert([
            'nama_laundry' => 'ZEA LAUNDRY',
            'alamat_laundry' => 'Jl. Cengger Ayam',
            'longitude_laundry' => '112.63198058763396',
            'latitude_laundry' => '-7.9493234160115485'
        ]);
    }
}
