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
            'telephone_no' => '+220 2349343, +220 5454098',
        ]);

        PoliceStation::firstOrCreate([
            'name' => 'Kanifing Police Station',
        ],[
            'location' => 'Kanifing',
            'telephone_no' => '+220 2349344, +220 5454096',
        ]);

        PoliceStation::firstOrCreate([
            'name' => 'Brikama Police Station',
        ],[
            'location' => 'Brikama',
            'telephone_no' => '+220 2349345, +220 5454093',
        ]);
    }
}
