<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AromaParfum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(ProdukJasaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AromaParfumSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(LaundrySeeder::class);
    }
}
