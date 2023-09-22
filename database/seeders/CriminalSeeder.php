<?php

namespace Database\Seeders;

use App\Models\Citizen;
use App\Models\Criminal;
use Carbon\Carbon;
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
            'telephone_no' => '+220 6885858',
        ],[
            'first_name' => 'Yam',
            'last_name' => 'Farm',
            'address' => 'Banjul',
            'dob' => Carbon::createFromDate(2000, 1, 1),
        ]);

        Criminal::firstOrCreate([
            'telephone_no' => '+220 6995858',
        ],[
            'first_name' => 'Carrot',
            'last_name' => 'Farm',
            'address' => 'Banjul',
            'dob' => Carbon::createFromDate(2001, 1, 1),
        ]);

        Criminal::firstOrCreate([
            'telephone_no' => '+220 6775858',
        ],[
            'first_name' => 'Cassava',
            'last_name' => 'Farm',
            'address' => 'Banjul',
            'dob' => Carbon::createFromDate(2001, 5, 1),
        ]);
    }
}
