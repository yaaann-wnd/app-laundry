<?php

namespace Database\Seeders;

use App\Models\ProdukJasa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukJasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produkJasa = [
            [
                'jenis_jasa' => 'Cuci Normal',
                'harga_perkg' => 10000
            ],
            [
                'jenis_jasa' => 'Cuci Normal + Setrika',
                'harga_perkg' => 15000
            ],
            [
                'jenis_jasa' => 'Paket Premium',
                'harga_perkg' => 25000
            ],
            [
                'jenis_jasa' => 'Paket ✨Aesthetic✨',
                'harga_perkg' => 40000
            ],
        ];

        foreach ($produkJasa as $produk) {
            ProdukJasa::insert([
                'jenis_jasa' => $produk['jenis_jasa'],
                'harga_perkg' => $produk['harga_perkg'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
