<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Supplier::create([
                'name' => $faker->unique()->name(),
                'phone' => $faker->phoneNumber()
            ]);
        }
    }
}
