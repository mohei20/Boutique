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
        $query = $request->input('query');
        $categories = Category::select('id', 'name')->get();

        if ($query) {
            $results = Product::where('name', 'LIKE', '%' . $query . '%')
                // ->orWhere('category_name', 'LIKE', '%' . $query . '%')
                // ->orWhere('supplier_name', 'LIKE', '%' . $query . '%')
                ->get();
            return view(
                'website.Search.results',
                [
                    'results' => $results,
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
            // ->orWhere('category_name', 'LIKE', '%' . $query . '%')
            // ->orWhere('supplier_name', 'LIKE', '%' . $query . '%')
            ->get();
        return view(
            'website.Search.results',
            [
                'results' => $results,
            ]
        );
    }
}
