<?php

namespace App\Http\Controllers\Website;

use App\Models\Order;
use App\Models\Order_infos;
use App\Models\Order_products;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function cart()
    {
        return view('website.cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id"  => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session();
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('danger', 'Product removed successfully');
        }
    }

    function purchase()
    {
        if (session('cart')) {
            return view('website.checkout');
        } else {
            return redirect()->back();
        }
    }

    function checkout(Request $request)
    {
        $total = 0;
        //get cart
        $carts = session()->get('cart', []);
        // create order
        $order = Order::create([
            'user_id' => Auth::user()->id, // function to get user id
        ]);
        //store product cart in database
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
            Order_products::create([
                'order_id' => $order->id,
                'product_id' => $cart['id'],
                'quantity' => $cart['quantity'],
            ]);
        }
        //stor total price in order table
        $order->total = $total;
        $order->save();
        // store phone and adress order in order info
        Order_infos::create([
            'order_id' => $order->id,
            'address' => $request->adress,
            'phone' => $request->phone,
        ]);
        // destroy session cart
        Session::forget('cart');
        return redirect('/');
    }
}
