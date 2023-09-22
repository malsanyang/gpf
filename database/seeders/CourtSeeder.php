<?php

namespace Database\Seeders;

use App\Library\Helper;
use App\Models\Court;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Court::firstOrCreate([
            'name' => 'High Court',
        ],[
            'location' => 'Banjul',
            'court_no' => Helper::generateRefNumber(),
        ]);

        Court::firstOrCreate([
            'name' => 'Kanifing Court',
        ],[
            'location' => 'Kanifing',
            'court_no' => Helper::generateRefNumber(),
        ]);

        Court::firstOrCreate([
            'name' => 'Brikama Court',
        ],[
            'location' => 'Brikama',
            'court_no' => Helper::generateRefNumber(),
        ]);
    }
}
