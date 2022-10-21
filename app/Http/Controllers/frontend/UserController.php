<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function userView($order_id)
    {
        $data['title'] = __('Order-Index');
        $data['order'] = Order::findOrFail($order_id);
        $data['orderItem'] = OrderItem::with('product')->where('order_id' ,$order_id)->get();
        $data['shipping'] = Shipping::where('order_id' ,$order_id)->first();
        return view('frontend.pages.viewOrder',$data);
    }
}
