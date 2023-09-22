<?php

namespace Database\Seeders;

use App\Library\Auth\LocalRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::firstOrCreate([
            'first_name' => 'Police',
            'last_name' => 'Officer1',
            'email' => 'police1@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
            'station_id' => 1,
        ]);
        $users->assignRole(LocalRole::ROLE_POLICE_OFFICER);

        $users = User::firstOrCreate([
            'first_name' => 'Investigator',
            'last_name' => 'Officer1',
            'email' => 'investigator1@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
            'station_id' => 1,
        ]);
        $users->assignRole(LocalRole::ROLE_INVESTIGATOR);

        $users = User::firstOrCreate([
            'first_name' => 'Police',
            'last_name' => 'Officer2',
            'email' => 'police2@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
            'station_id' => 2,
        ]);
        $users->assignRole(LocalRole::ROLE_POLICE_OFFICER);

        $users = User::firstOrCreate([
            'first_name' => 'Investigator',
            'last_name' => 'Officer2',
            'email' => 'investigator2@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
            'station_id' => 2,
        ]);
        $users->assignRole(LocalRole::ROLE_INVESTIGATOR);

        $users = User::firstOrCreate([
            'first_name' => 'Police',
            'last_name' => 'Officer3',
            'email' => 'police3@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
            'station_id' => 3,
        ]);
        $users->assignRole(LocalRole::ROLE_POLICE_OFFICER);

        $users = User::firstOrCreate([
            'first_name' => 'Investigator',
            'last_name' => 'Officer3',
            'email' => 'investigator3@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
            'station_id' => 3,
        ]);
        $users->assignRole(LocalRole::ROLE_INVESTIGATOR);

        $users = User::firstOrCreate([
            'first_name' => 'Prosecutor',
            'last_name' => 'One',
            'email' => 'prosecutor1@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
        ]);
        $users->assignRole(LocalRole::ROLE_PROSECUTOR);

        $users = User::firstOrCreate([
            'first_name' => 'Prosecutor',
            'last_name' => 'Two',
            'email' => 'prosecutor2@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
            'address' => 'Brikama',
            'telephone_no' => '+220 2323232',
        ]);
        $users->assignRole(LocalRole::ROLE_PROSECUTOR);
    }
}
