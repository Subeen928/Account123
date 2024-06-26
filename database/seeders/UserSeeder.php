<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        $user = User::create([
            'name' => "Test User",
            'email' => "test@user.com",
            'password' => Hash::make('password'), // Use Hash::make for secure password storage
        ]);

        // Now you can access the user's id
        echo $user->id;


    }
}
