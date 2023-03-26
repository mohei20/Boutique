<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;


use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $categoriesIds = Category::pluck('id');
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => $faker->unique()->sentence(1),
                'price' => $faker->numberBetween(1, 500),
                'image' => 'product-' . rand(1, 12) . '.jpg',
                'descreption' => $faker->unique()->sentence(3),
                'offers' => $faker->numberBetween(0, 70),
                'sales' => $faker->numberBetween(1, 500),
                'origin' => $faker->city,
                'category_id' => $categoriesIds->random()
            ]);
        }
    }
}
