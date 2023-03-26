<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create Dummy Admin
        $role = [1, Null];
        $faker = Factory::create();
        for ($i = 0; $i < 4; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique->safeEmail(),
                'password' => Hash::make('123456'),
                'isAdmin' => $role[rand(0, 1)],
                'image' => rand(1, 4) . '.jpg',
                'email_verified_at' => now()
            ]);
        }
    }
}
