<?php

namespace App\Http\Controllers\backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $data['title'] = __("Slider");
        $data['sliders'] = Slider::latest()->paginate(6);
        return view('backend.pages.slider.index', $data);
    }
    public function create()
    {
        $data['title'] = __("Slider/Create");
        return view('backend.pages.slider.create', $data);
    }
    public function store(SliderRequest $request)
    {
        $path = '';
        if($request->hasFile("image")){
            $path = $request->file("image")->store('images/sliders');
        }
        $slider =Slider::create([
            'title' =>$request->get('title'),
            'sub_title' =>$request->get('sub_title'),
            'description' =>$request->get('description'),
            'url' =>$request->get('url'),
            'image' =>$path
        ]);
        if(empty($slider))
        {
            return redirect()->back();
        }
        return redirect()->route('sliders.index')->with('message', 'Slider created successfull!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(Slider $slider)
    {
        $data['title'] = __("Slider/Edit");
        $data['slider'] = $slider;
        return view('backend.pages.slider.edit', $data);
    }
    public function update(SliderRequest $request, Slider $slider)
    {
        $path = '';
        if($slider->image){
            Storage::delete($slider->image);
        }
        if($request->hasFile("image")){
            $path = $request->file("image")->store('images/sliders');
        }
        $params = $request->only(['title','sub_title','description','url']);
        $params['image'] = $path;
        if($slider->update($params))
        {
            return redirect()->route('sliders.index')->with('message', 'Slider edited successfull!!');
        }
    }
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->with('message', 'Slider deleted successfull!!');
    }
}
