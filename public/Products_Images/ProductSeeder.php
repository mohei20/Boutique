<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $product =   Product::create([
                'name' => $faker->unique()->sentence(1),
                'price' => $faker->numberBetween(1, 500),
                'image' => 'produt-' . rand(1, 12) . '.jpg',
                'descreption' => $faker->unique()->sentence(3),
            ]);
        }
    }
}
