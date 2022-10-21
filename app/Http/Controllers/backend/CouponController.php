<?php

namespace App\Http\Controllers\backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    public function index()
    {
        $data['title'] = __("Coupon");
        $data['coupons'] = Coupon::paginate(5);
        return view('backend.pages.coupon.index', $data);
    }
    public function create()
    {
        $data['title'] = __("Coupon/Create");
        return view('backend.pages.coupon.create', $data);
    }
    public function store(CouponRequest $request)
    {
        $coupon =Coupon::create([
            'coupon_name' => $request->get('coupon_name'),
            'coupon_discount' =>$request->get('coupon_discount'),
        ]);
        if(empty($coupon))
        {
            return redirect()->back();
        }
        return redirect()->route('coupons.index')->with('message', 'Coupon created successfull!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(Coupon $coupon)
    {
        $data['title'] = __("Coupon/Edit");
        $data['coupon'] = $coupon;
        return view('backend.pages.coupon.edit', $data);
    }
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $params = $request->only(['coupon_name','coupon_discount']);
        if($coupon->update($params))
        {
            return redirect()->route('coupons.index')->with('message', 'Coupon edited successfull!!');
        }
    }
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index')->with('message', 'Coupon deleted successfull!!');
    }
}
