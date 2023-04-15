<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::select('name', 'price', 'image')->latest()->paginate(9);
        // $categories = Category::select('id', 'name', 'image')->get();
        // return view("website.shop", [
        //     'products' => $products,
        //     'categories' => $categories
        // ]);
    }
}
