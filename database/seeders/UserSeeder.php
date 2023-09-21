<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'username' => 'admin',
                'nama' => 'admin',
                'alamat' => 'Daegu',
                'no_telp' => '0912738782',
                'jabatan' => 'admin',
                'status' => '',
                'password' => Hash::make('admin'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'kasir',
                'nama' => 'kasir',
                'alamat' => 'Daegu',
                'no_telp' => '0091328112',
                'jabatan' => 'kasir',
                'status' => '',
                'password' => Hash::make('kasir'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'kurir',
                'nama' => 'kurir',
                'alamat' => 'Daegu',
                'no_telp' => '0857352441',
                'jabatan' => 'kurir',
                'status' => '',
                'password' => Hash::make('kurir'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($user as $u) {
            User::insert([
                'username' => $u['username'],
                'nama' => $u['nama'],
                'alamat' => $u['alamat'],
                'no_telp' => $u['no_telp'],
                'jabatan' => $u['jabatan'],
                'status' => $u['status'],
                'password' => $u['password'],
                'created_at' => $u['created_at'],
                'updated_at' => $u['updated_at'],
            ]);
        }
    }
}
