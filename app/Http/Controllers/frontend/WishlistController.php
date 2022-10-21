<?php

namespace App\Http\Controllers\frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {
        $data['title'] = __("Wishlist");
        $data['wishlists'] = Wishlist::with('product')->latest()->paginate(6);
        return view('frontend.pages.wishlist',$data);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
            $wishlist =Wishlist::create([
                'product_id' =>$request->get('product_id'),
            ]);
        if(empty($wishlist))
        {
            return redirect()->back('message', 'Wishlist empty!!');
        }
        return back()->with('message', 'Wishlist has added!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(Wishlist $wishlist)
    {
        //
    }
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->back()->with('message', 'Wishlist deleted successfull!!');
    }
}
