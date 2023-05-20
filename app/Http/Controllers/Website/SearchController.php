<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->input('query');
        $categories = Category::select('id', 'name')->get();

        if ($searchQuery) {
            $products = Product::where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('category', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                    })
                    ->orWhereHas('category.supplier', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                    });
            })->get();
            return view(
                'website.Search.results',
                [
                    'results' => $products,
                    'categories' => $categories
                ]
            );
        }

        return redirect()->route('home');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Product::with('category', 'supplier')
            ->where('name', 'LIKE', '%' . $query . '%')
            ->get();
        return view(
            'website.Search.results',
            [
                'results' => $results,
            ]
        );
    }
}
