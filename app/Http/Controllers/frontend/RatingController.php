<?php

namespace App\Http\Controllers\frontend;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'star_rating' => 'required',
            'message'  => 'required',
         ]);

         $rating = Rating::create([
            'product_id' =>$request->get('product_id'),
            'name' =>$request->get('name'),
            'email' =>$request->get('email'),
            'star_rating' =>$request->get('star_rating'),
            'message' =>$request->get('message'),
        ]);
        if(empty($rating))
        {
            return redirect()->back('message', 'Please Retry!!');
        }
        return back()->with('message', 'Review done!!');
    }
}
