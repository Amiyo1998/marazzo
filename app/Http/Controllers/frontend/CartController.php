<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $data['title'] = __("Cart/Shopping Cart");
        $data['carts'] = Cart::with('product')->latest()->paginate(6);
        return view('frontend.pages.shoppingCart',$data);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $cart = Cart::orWhere('ip_address', request()->ip())
        ->where('product_id',$request->get('product_id'))
        ->first();

        if(!is_null($cart)){
            $cart->increment('product_qty');
        }
        else{
            $cart =Cart::create([
                'product_id' =>$request->get('product_id'),
                'product_qty' => 1,
                'ip_address' => request()->ip(),
                'price' =>$request->get('price'),
            ]);
        }

        if(empty($cart))
        {
            return redirect()->back('message', 'Product empty!!');
        }
        return back()->with('message', 'Product has added to cart!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(Cart $cart)
    {
        //
    }
    public function update(Request $request, Cart $cart)
    {
        $data['cart'] = $cart;
        $params = $request->only(['product_qty']);
        if($cart->update($params))
        {
            return redirect()->back()->with('message', 'Cart Updated successfull!!');
        }
    }
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('message', 'Cart deleted successfull!!');
    }
}
