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
            'name' => 'Super Admin',
            'email' => 'dev@malsanyang.com'
        ],[
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('secret'),
            'active' => true,
        ]);

        $users->assignRole(LocalRole::ROLE_SUPER_ADMIN);
    }
}
