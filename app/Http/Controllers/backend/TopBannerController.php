<?php

namespace App\Http\Controllers\backend;

use App\Models\TopBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;

class TopBannerController extends Controller
{
    public function index()
    {
        $data['title'] = __("Banner");
        $data['banners'] = TopBanner::latest()->paginate(6);
        return view('backend.pages.banner.index', $data);
    }
    public function create()
    {
        $data['title'] = __("Banner/Create");
        return view('backend.pages.banner.create', $data);
    }
    public function store(BannerRequest $request)
    {
        $path = '';
        if($request->hasFile("image")){
            $path = $request->file("image")->store('images/banners');
        }
        $banner =TopBanner::create([
            'image' =>$path
        ]);
        if(empty($banner))
        {
            return redirect()->back();
        }
        return redirect()->route('banners.index')->with('message', 'Banner created successfull!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(TopBanner $banner)
    {
        $data['title'] = __("Banner/Edit");
        $data['banner'] = $banner;
        return view('backend.pages.banner.edit', $data);
    }
    public function update(BannerRequest $request, TopBanner $banner)
    {
        $path = '';
        if($banner->image){
            Storage::delete($banner->image);
        }
        if($request->hasFile("image")){
            $path = $request->file("image")->store('images/banners');
        }
        $params['image'] = $path;
        if($banner->update($params))
        {
            return redirect()->route('banners.index')->with('message', 'Banner edited successfull!!');
        }
    }
    public function destroy(TopBanner $banner)
    {
        $banner->delete();
        return redirect()->route('banners.index')->with('message', 'Banner deleted successfull!!');
    }
}
