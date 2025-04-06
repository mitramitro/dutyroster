<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'name' => 'Admin',
                'email' => Str::random(10) . '@gmail.com',
                'office' => 'Integrated Terminal Balongan',
                'position' => 'officer',
                'nohp' => '085234234234',
                'role' => 'admin'
            ],

        ]);
    }
}
