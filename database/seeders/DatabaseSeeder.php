<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CitizenSeeder::class);
        $this->call(CourtSeeder::class);
        $this->call(CriminalSeeder::class);
        $this->call(PoliceStationSeeder::class);
        $this->call(PrisonSeeder::class);
        $this->call(CrimeSeeder::class);
    }
}
