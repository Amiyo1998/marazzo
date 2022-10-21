<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Slider;
use App\Models\TopBanner;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = __("Dashboard");
        $data['categories'] = Category::all();
        $data['subCategories'] = SubCategory::all();
        $data['sliders'] = Slider::all();
        $data['products'] = Product::all();
        $data['ratings'] = Rating::all();
        $data['coupons'] = Coupon::all();
        $data['banners'] = TopBanner::all();
        $data['wishlists'] = Wishlist::all();
        $data['orders'] = Order::all();

        return view('backend.pages.dashboard',$data);
    }
}
