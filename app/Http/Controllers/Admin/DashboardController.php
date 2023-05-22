<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $suppliers_no = Supplier::all()->count();
        $categories_no = Category::all()->count();
        $products_no = Product::all()->count();
        $normalUsers_no = User::where('isAdmin', null)->count();
        $admins_no = User::where('isAdmin', 1)->count();
        $orders = Order::all()->count();
        return view(
            'Admin.home',
            [
                'suppliers_no' => $suppliers_no,
                'categories_no' => $categories_no,
                'products_no' => $products_no,
                'normalUsers_no' => $normalUsers_no,
                'admins_no' => $admins_no,
                'orders' => $orders
            ]
        );
    }
}
