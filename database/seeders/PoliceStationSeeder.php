<?php

namespace Database\Seeders;

use App\Models\PoliceStation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliceStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PoliceStation::firstOrCreate([
            'name' => 'Banjul Police Station',
        ],[
            'location' => 'Banjul',
        ]);

        PoliceStation::firstOrCreate([
            'name' => 'Kanifing Police Station',
        ],[
            'location' => 'Kanifing',
        ]);

        PoliceStation::firstOrCreate([
            'name' => 'Brikama Police Station',
        ],[
            'location' => 'Brikama',
        ]);
    }
}
