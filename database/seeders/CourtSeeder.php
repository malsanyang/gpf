<?php

namespace Database\Seeders;

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
        ]);

        Court::firstOrCreate([
            'name' => 'Kanifing Court',
        ],[
            'location' => 'Kanifing',
        ]);

        Court::firstOrCreate([
            'name' => 'Brikama Court',
        ],[
            'location' => 'Brikama',
        ]);
    }
}
