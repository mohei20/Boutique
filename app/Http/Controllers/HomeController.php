<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select('name', 'price', 'image')->orderBy('id', 'desc')->paginate(9);
        $categories = Category::select('id', 'name')->get();
        return view("website.index", ['products' => $products, 'categories' => $categories]);
    }
}
