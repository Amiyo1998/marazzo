<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{

    public function index()
    {
        $data['title'] = __('Order-Index');
        $data['orders'] = Order::latest()->get();
        return view('backend.pages.order.index',$data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($order_id)
    {
        $data['title'] = __('View-Order');
        $data['order'] = Order::findOrFail($order_id);
        $data['orderItems'] = OrderItem::with(['product'])->where('order_id' ,$order_id)->get();
        $data['shipping'] = Shipping::where('order_id' ,$order_id)->first();
        return view('backend.pages.order.view',$data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
