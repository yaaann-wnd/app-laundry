<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::insert([
            'nama_member' => 'member',
            'no_telp_member' => '091832120',
            'alamat_member' => 'lowokwaru',
            'password' => Hash::make('member')
        ]);
    }
}
