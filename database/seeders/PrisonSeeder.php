<?php

namespace Database\Seeders;

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
        ]);

        Prison::firstOrCreate([
            'name' => 'Mile 7',
        ],[
            'location' => 'Josuwan',
        ]);
    }
}
