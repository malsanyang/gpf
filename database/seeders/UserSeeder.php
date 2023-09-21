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
            'name' => 'Police Officer',
            'email' => 'police@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
        ]);

        $users->assignRole(LocalRole::ROLE_POLICE_OFFICER);

        $users = User::firstOrCreate([
            'name' => 'Investigator',
            'email' => 'investigator@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
        ]);

        $users->assignRole(LocalRole::ROLE_INVESTIGATOR);

        $users = User::firstOrCreate([
            'name' => 'Prosecutor',
            'email' => 'prosecutor@gpf.gm'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
        ]);

        $users->assignRole(LocalRole::ROLE_PROSECUTOR);
    }
}
