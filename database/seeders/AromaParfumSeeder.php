<?php

namespace Database\Seeders;

use App\Models\AromaParfum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AromaParfumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aroma_parfum = [
            [
                'aroma_parfum' => 'Citrus',
            ],
            [
                'aroma_parfum' => 'Oseanic',
            ],
            [
                'aroma_parfum' => 'Oriental',
            ],
            [
                'aroma_parfum' => 'Woody',
            ],
        ];
        foreach ($aroma_parfum as $ap) {
            AromaParfum::insert([
                'aroma_parfum' => $ap['aroma_parfum'],
            ]);
        }
    }
}
