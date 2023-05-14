<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Trait\ImageTrait;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'image', 'supplier_id')->with('supplier')->get();

        return view(
            'Admin.Category.index',
            [
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supplier = Supplier::select('id', 'name')->get();
        return view('Admin.Category.create', ['supplier' => $supplier]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputdata = $request->all();
        $inputdata['image'] = $this->insertImage($request->name, $request->image, 'Categories_Images/');
        $category = Category::create($inputdata);
        $category->suppliers()->syncWithoutDetaching($request->supplier);
        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $supplier = Supplier::select('id', 'name')->get();
        return view(
            "Admin.category.edit",
            [
                "supplier" => $supplier,
                "category" => $category
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $inputdata = $request->all();
        if ($request->file("image")) {
            Storage::disk('category_image')->delete($category->image);
            $inputdata['image'] = $this->insertImage($request->name, $request->image, 'Categories_Images/');
        }
        $category->update($inputdata);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::disk('category_image')->delete($category->image);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
