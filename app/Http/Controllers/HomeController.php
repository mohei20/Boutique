<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'image')->latest()->paginate(9);
        $categories = Category::select('id', 'name')->get();
        return view("website.index", [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
