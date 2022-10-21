<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\TopBannerController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\backend\AdminOrderController;
use App\Http\Controllers\backend\SubCategoryController;

Route::get('/admin', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';

//==============PageController==========
Route::get('/',[PageController::class,'home'])->name('home');
Route::get('/view-category/{id}',[PageController::class,'viewCategory'])->name('view-category');
Route::get('/view-product/{id}',[PageController::class,'viewProduct'])->name('view-product');
Route::resource('carts', CartController::class);

//=========apply coupon===========
Route::post('/apply-coupon',[PageController::class,'applyCoupon'])->name('apply-coupon');
Route::get('/apply-destroy',[PageController::class,'destroyCoupon'])->name('apply-destroy');

//================Checkout==========
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');

//================Place Order==========
Route::post('place/order', [OrderController::class, 'placeOrder'])->name('place-order');
Route::get('order/success', [OrderController::class, 'successOrder'])->name('success-order');

//=============User order============
Route::get('user/order', [UserController::class, 'userOrder'])->name('user-order');
Route::get('user/order-view/{id}', [UserController::class, 'userView'])->name('user-view');

//=============Wishlist============
Route::resource('wishlists', WishlistController::class);

//=============Rating============
Route::post('rating', [RatingController::class, 'rating'])->name('rating');

//==============AdminController==========
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);
Route::resource('sliders', SliderController::class);
Route::resource('products', ProductController::class);
Route::resource('coupons', CouponController::class);
Route::resource('banners', TopBannerController::class);

//================Admin View Order==========
Route::resource('admin/orders', AdminOrderController::class);
