<?php

namespace Database\Seeders;

use App\Library\Helper;
use App\Models\Prison;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prison::firstOrCreate([
            'name' => 'Mile 2',
        ],[
            'location' => 'Banjul',
            'prison_no' => Helper::generateRefNumber(),
        ]);

        Prison::firstOrCreate([
            'name' => 'Mile 7',
        ],[
            'location' => 'Josuwan',
            'prison_no' => Helper::generateRefNumber(),
        ]);
    }
}
