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
            'telephone_no' => '+220 5885858',
        ],[
            'first_name' => 'Yam',
            'last_name' => 'Beans',
            'address' => 'Banjul',
            'email' => 'yam.beans@gmail.com'
        ]);

        Citizen::firstOrCreate([
            'telephone_no' => '+220 5995858',
        ],[
            'first_name' => 'Carrot',
            'last_name' => 'Beans',
            'address' => 'Brikama',
            'email' => 'carrot.beans@gmail.com'
        ]);

        Citizen::firstOrCreate([
            'telephone_no' => '+220 5775858',
        ],[
            'first_name' => 'Cassava',
            'last_name' => 'Beans',
            'address' => 'Serekunda',
            'email' => 'cassava.beans@gmail.com'
        ]);
    }
}
