<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::select('id', 'name')->get();

        $products = Product::where('category_id', '=', $category->id)
            ->select('id', 'name', 'image', 'price')
            ->paginate(9);
        return view(
            "website.category",
            [
                "category" => $category,
                "categories" => $categories,
                "products" => $products,
                "cat_id" => $id
            ]
        );
    }
}
