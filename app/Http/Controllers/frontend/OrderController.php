<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
        ]);

        $order_id = Order::insertGetId([
            'invoice_no'     => mt_rand(10000000, 99999999),
            'payment'        => $request->payment,
            'total'          => $request->total,
            'subtotal'       => $request->subtotal,
            'coupon_discount'=> $request->coupon_discount,
            'created_at'     =>Carbon::now()
        ]);

        $carts = Cart::Where('ip_address', request()->ip())->latest()->get();
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id'   => $order_id,
                'product_id' => $cart->product_id,
                'product_qty'=> $cart->product_qty
            ]);
        }

        Shipping::create([
            'order_id'  => $order_id,
            'fname'     => $request->get('fname'),
            'lname'     => $request->get('lname'),
            'email'     => $request->get('email'),
            'number'    => $request->get('number'),
            'address1'  => $request->get('address1'),
            'address2'  => $request->get('address2'),
            'country'   => $request->get('country'),
            'state'     => $request->get('state'),
            'city'      => $request->get('city'),
            'zip'       => $request->get('zip'),
            'created_at'=>Carbon::now()
        ]);

        if(session()->has('coupon')){
            session()->forget('coupon');
        }

        Cart::Where('ip_address', request()->ip())->delete();

       return redirect()->route('success-order')->with('message', 'Order Complete');
    }

    public function successOrder()
    {
        $data['title'] = __('Order-Complete');
        $data['orders'] = Order::latest()->get();
        return view('frontend.pages.orderComplete',$data);
    }

    //admin order
    // public function orderIndex()
    // {
    //     $data['title'] = __('Order-Index');
    //     $data['orders'] = Order::latest()->get();
    //     return view('backend.pages.order.index',$data);
    // }

    // public function viewOrder($order_id)
    // {
    //     $data['title'] = __('View-Order');
    //     $data['order'] = Order::findOrFail($order_id);
    //     $data['orderItems'] = OrderItem::with('product')->where('order_id' ,$order_id)->get();
    //     $data['shipping'] = Shipping::where('order_id' ,$order_id)->first();
    //     return view('backend.pages.order.view',$data);
    // }

    // public function deleteOrder(Order $order)
    // {
    //     $order->delete();
    //     return redirect()->back();
    // }
}
