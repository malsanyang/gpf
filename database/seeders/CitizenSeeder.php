<?php

namespace Database\Seeders;

use App\Models\Citizen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Citizen::firstOrCreate([
            'nin_number' => '2019-010010101',
        ],[
            'name' => 'Yam Beans',
            'phone_number' => '28383993'
        ]);

        Citizen::firstOrCreate([
            'nin_number' => '2019-010010102',
        ],[
            'name' => 'Carrot Beans',
            'phone_number' => '28383993'
        ]);

        Citizen::firstOrCreate([
            'nin_number' => '2019-010010103',
        ],[
            'name' => 'Cassava Beans',
            'phone_number' => '28383993'
        ]);
    }
}
