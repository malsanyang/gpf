<?php

namespace Database\Seeders;

use App\Models\Citizen;
use App\Models\Criminal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criminal::firstOrCreate([
            'nin_number' => '2020-010010101',
        ],[
            'name' => 'Yam Farm',
            'phone_number' => '28383993'
        ]);

        Criminal::firstOrCreate([
            'nin_number' => '2020-010010102',
        ],[
            'name' => 'Carrot Farm',
            'phone_number' => '28383993'
        ]);

        Criminal::firstOrCreate([
            'nin_number' => '2020-010010103',
        ],[
            'name' => 'Cassava Farm',
            'phone_number' => '28383993'
        ]);
    }
}
