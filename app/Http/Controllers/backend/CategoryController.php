<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $data['title'] = __("Category");
        $data['categories'] = Category::latest()->paginate(6);
        return view('backend.pages.category.index', $data);
    }
    public function create()
    {
        $data['title'] = __("Category/Create");
        return view('backend.pages.category.create', $data);
    }
    public function store(CategoryRequest $request)
    {
        $category =Category::create([
            'name' =>$request->get('name'),
        ]);
        if(empty($category))
        {
            return redirect()->back();
        }
        return redirect()->route('categories.index')->with('message', 'Category created successfull!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(Category $category)
    {
        $data['title'] = __("Category/Edit");
        $data['category'] = $category;
        return view('backend.pages.category.edit', $data);
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $params = $request->only(['name']);
        if($category->update($params))
        {
            return redirect()->route('categories.index')->with('message', 'Category edited successfull!!');
        }
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category deleted successfull!!');
    }
}
