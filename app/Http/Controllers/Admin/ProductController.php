<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Trait\ImageTrait;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select()->with('category')->get();
        return view(
            'Admin.Product.index',
            [
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view(
            'Admin.Product.create',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputdata = $request->all();
        $inputdata['image'] = $this->insertImage($request->name, $request->image, 'Products_Images/');
        Product::create($inputdata);
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return view(
            'Admin.Product.edit',
            [
                'product' => $product,
                'categories' => $categories
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $inputdata = $request->all();
        if ($request->file("image")) {
            Storage::disk('product_image')->delete($product->image);
            $inputdata['image'] = $this->insertImage($request->name, $request->image, 'Products_Images/');
        }
        $product->update($inputdata);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('product_image')->delete($product->image);
        $product->delete();
        return redirect()->route('products.index');
    }
}
