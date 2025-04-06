<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OnDutySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('on_duty_rosters')->insert([
            [
                'tanggal' => '2025-03-12',
                'location_id' => 1, // ID lokasi dari tabel locations
                'manager_on_duty_id' => 1, // ID karyawan dari tabel employees
                'hsse_id' => 2,
                'mps_id' => 3,
                'ssga_qq_id' => 4,
                'rsd_fuel_pagi_id' => 5,
                'rsd_fuel_sore_id' => 6,
                'rsd_lpg_pagi_id' => 7,
                'rsd_lpg_sore_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2025-03-13',
                'location_id' => 2,
                'manager_on_duty_id' => 2,
                'hsse_id' => 3,
                'mps_id' => 4,
                'ssga_qq_id' => 5,
                'rsd_fuel_pagi_id' => 6,
                'rsd_fuel_sore_id' => 7,
                'rsd_lpg_pagi_id' => 8,
                'rsd_lpg_sore_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
