<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Kepala PPIC",
            'email' => "ppic@uwk.co.id",
            'password' => "AdminUwk@2024",
            'role' => "Admin",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Lapangan Sawmill",
            'email' => "sawmill@uwk.co.id",
            'password' => "SawmillUwk@2024",
            'role' => "Sawmill",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Lapangan Roughmill",
            'email' => "roughmill@uwk.co.id",
            'password' => "RoughmillUwk@2024",
            'role' => "Roughmill",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Lapangan Milling",
            'email' => "milling@uwk.co.id",
            'password' => "MillingUwk@2024",
            'role' => "Milling",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Lapangan Assembling",
            'email' => "assembling@uwk.co.id",
            'password' => "AssemblingUwk@2024",
            'role' => "Assembling",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Lapangan Finishing",
            'email' => "finishing@uwk.co.id",
            'password' => "FinishingUwk@2024",
            'role' => "Finishing",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Lapangan Packing",
            'email' => "packing@uwk.co.id",
            'password' => "PackingUwk@2024",
            'role' => "Packing",
        ]);

        User::create([
            'kode_user' => 'KU_UWK_'.date('yds').random_int(3,1000),
            'name' => "Admin Kepala Pola",
            'email' => "pola@uwk.co.id",
            'password' => "PolaUwk@2024",
            'role' => "Pola",
        ]);
    }
}
