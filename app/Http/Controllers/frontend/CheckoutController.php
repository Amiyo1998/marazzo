<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $data['title'] = __('Checkout');
        $data['carts'] =Cart::all();
        return view('frontend.pages.checkout',$data);
    }
}
