<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\TopBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        $data['categories'] = Category::all();
        //$data['slide_category'] = Category::latest()->paginate(3);
        $data['sliders'] = Slider::all();
        $data['products'] = Product::with('rating')->get();
        $data['slidProducts'] = Product::with('rating')->latest()->paginate(3);
        $data['banners'] = TopBanner::latest()->paginate(3);
        // $data['ratings'] = Rating::where('product_id',$data['products']->id )->get();
        // $data['rating_sum'] = Rating::where('product_id',$data['products']->id )->sum('star_rating');
        // $date['rating_value'] = $data['rating_sum'] / $data['ratings']->count();
        return view('frontend.pages.home',$data);
    }
    public function viewCategory($id)
    {
        $data['categories'] = Category::all();
        $data['category'] = Category::where('id', $id)->first();
        if($data['category'])
        {
            $data['title']     =__("View-Category");
            $data['products'] = Product::where('cat_id', $data['category']->id)->get();
            return view('frontend.pages.categorypage', $data);
        }
        else{
            return redirect()->back();
        }
    }
    public function viewProduct($id)
    {
        if(Category::where('id', $id)->exists())
        {
            if($data['products'] = Product::where('id',$id)->exists())
            {
                $data['title']     =__("Product-View");
                $data['slidProducts'] = Product::latest()->paginate(3);
                $data['products'] = Product::with('rating')->where('id',$id)->first();
                $data['ratings'] = Rating::where('product_id',$data['products']->id )->get();
                $data['rating_sum'] = Rating::where('product_id',$data['products']->id )->sum('star_rating');
                $date['rating_value'] = $data['rating_sum'] / $data['ratings']->count();
                $data['prods'] = Product::all();
                $data['categories'] = Category::where('id', $id)->first();
                //$data['related_pro'] = Product::where('cat_id', $data['categories']->id)->get();
                return view('frontend.pages.productpage', $data);
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back()->with('message', 'Not such category found !!');
        }

    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->first();
        if($coupon){
            $subtotal = Cart::all()->where('ip_address', request()->ip())->sum(
                function($t){
                   return $t->price * $t->product_qty;
                });
            session()->put('coupon',[
                'coupon_name' =>$coupon->coupon_name,
                'coupon_discount' =>$coupon->coupon_discount,
                'discount_amount' => $subtotal * ($coupon->coupon_discount/100),

            ]);
            return redirect()->back()->with('message', 'Applied Coupon!!');
        }else{
            return redirect()->back()->with('message', 'Invalid Coupon!!');
        }
    }
    public function destroyCoupon()
    {
        if(session()->has('coupon')){
            session()->forget('coupon');
            return redirect()->back()->with('message', 'Deleted Coupon!!');
        }

    }
}
