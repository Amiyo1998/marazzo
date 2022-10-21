<?php

namespace App\Http\Controllers\backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        $data['title'] = __("Sub-Category");
        $data['subCategories'] = SubCategory::with('category')->latest()->paginate(6);
        return view('backend.pages.subcategory.index', $data);
    }
    public function create()
    {
        $data['title'] = __("Sub-Category/Create");
        $data['categories'] = Category::latest()->get();
        return view('backend.pages.subcategory.create', $data);
    }
    public function store(SubCategoryRequest $request)
    {
        $subCategory =SubCategory::create([
            'cat_id' =>$request->get('cat_id'),
            'name' =>$request->get('name'),
        ]);
        if(empty($subCategory))
        {
            return redirect()->back();
        }
        return redirect()->route('subcategories.index')->with('message', 'SubCategory created successfull!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(SubCategory $subCategory)
    {
        $data['title'] = __("SubCategory/Edit");
        $data['subCategory'] = $subCategory;
        return view('backend.pages.subCategory.edit', $data);
    }
    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {
        $params = $request->only(['cat_id','name']);
        if($subCategory->update($params))
        {
            return redirect()->route('subcategories.index')->with('message', 'SubCategory edited successfull!!');
        }
    }
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('subcategories.index')->with('message', 'SubCategory deleted successfull!!');
    }
}
