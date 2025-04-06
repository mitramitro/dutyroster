<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('locations')->insert([
            ['id' => 1, 'nama_lokasi' => 'Integrated Terminal Balongan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama_lokasi' => 'Integrated Terminal Jakarta', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama_lokasi' => 'Fuel Terminal Cikampek', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
