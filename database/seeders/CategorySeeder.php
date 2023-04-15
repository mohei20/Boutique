<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $suppliersIds = Supplier::pluck('id');

        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => $faker->name(),
                'image' => 'cat-img-' . rand(1, 4) . '.jpg',
                'supplier_id' => $suppliersIds->random()
            ]);
        }
    }
}
