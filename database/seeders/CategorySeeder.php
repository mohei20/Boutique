<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $categories = [
            'c1' => ['name' => 'Clothes', 'image' => 'cat-img-1.jpg'],
            'c2' => ['name' => 'Shoes', 'image' => 'cat-img-2.jpg'],
            'c3' => ['name' => 'Watches', 'image' => 'cat-img-3.jpg'],
            'c4' => ['name' => 'Electronics', 'image' => 'cat-img-4.jpg'],
        ];
        Category::insert($categories);
    }
}
