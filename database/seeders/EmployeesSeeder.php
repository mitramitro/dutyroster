<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'nama' => 'Andi Saputra',
                'jabatan' => 'Manager',
                'fungsi' => 'Manager',
                'photo' => null,
                'nohp' => '081234567890',
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'HSSE',
                'fungsi' => 'HSSE',
                'photo' => null,
                'nohp' => '0812345777770',
                'location_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Citra Lestari',
                'jabatan' => 'MPS',
                'fungsi' => 'MPS',
                'photo' => null,
                'nohp' => '085554567890',
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Dewi Anggraini',
                'jabatan' => 'SSGA/QQ Supervisor',
                'fungsi' => 'SSGA/QQ',
                'photo' => null,
                'nohp' => '081666667890',
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Eko Prasetyo',
                'jabatan' => 'RSD Fuel',
                'fungsi' => 'RSD Fuel Pagi',
                'photo' => null,
                'nohp' => '0819999967890',
                'location_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fajar Nugroho',
                'jabatan' => 'RSD Fuel',
                'fungsi' => 'RSD Fuel Sore',
                'photo' => null,
                'nohp' => '081676767890',
                'location_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Gita Maharani',
                'jabatan' => 'RSD LPG',
                'fungsi' => 'RSD LPG Pagi',
                'photo' => null,
                'nohp' => '081345667890',
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hadi Wijaya',
                'jabatan' => 'RSD LPG',
                'fungsi' => 'RSD LPG Sore',
                'photo' => null,
                'nohp' => '081223647890',
                'location_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
