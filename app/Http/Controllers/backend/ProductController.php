<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data['title'] = __("Product");
        $data['products'] = Product::with(['category'])->latest()->paginate(6);
        return view('backend.pages.product.index', $data);
    }
    public function create()
    {
        $data['title'] = __("Product/Create");
        $data['categories'] = Category::latest()->get();
        // $data['subCategories'] = SubCategory::latest()->get();
        return view('backend.pages.product.create', $data);
    }
    public function store(ProductRequest $request)
    {
        $img_one = '';
        if($request->hasFile("cover")){
            $img_one = $request->file("cover")->store('images/products/cover');
        }

        $img_two = '';
        if($request->hasFile("hover")){
            $img_two = $request->file("hover")->store('images/products/hover');
        }

        $files = '';
        if($request->hasfile('images'))
         {
            // foreach($request->file('images') as $file)
            // {
            //     $name = $file->extension();
            //     $file->store('images/products/images',$name);
            //     $files[] = $name;
            // }
            $files = $request->file("images")->store('images/products/images');
         }

        $product =Product::create([
            'cat_id' =>$request->get('cat_id'),
            // 'subcat_id' =>$request->get('subcat_id'),
            'name' =>$request->get('name'),
            'slug' =>$request->get('slug'),
            'small_description' =>$request->get('small_description'),
            'description' =>$request->get('description'),
            'regular_price' =>$request->get('regular_price'),
            'seller_price' =>$request->get('seller_price'),
            'product_quantity' =>$request->get('product_quantity'),
            'cover' =>$img_one,
            'hover' =>$img_two,
            'images' =>$files
        ]);
        if(empty($product))
        {
            return redirect()->back();
        }
        return redirect()->route('products.index')->with('message', 'Product created successfull!!');
    }
    public function show($id)
    {
        //
    }
    public function edit(Product $product)
    {
        $data['title'] = __("Product/Edit");
        $data['product'] = $product;
        return view('backend.pages.product.edit', $data);
    }
    public function update(ProductRequest $request, Product $product)
    {
        $img_one = '';
        if($product->cover){
            Storage::delete($product->cover);
        }
        if($request->hasFile("cover")){
            $img_one = $request->file("cover")->store('images/products/cover');
        }

        $img_two = '';
        if($product->hover){
            Storage::delete($product->hover);
        }
        if($request->hasFile("hover")){
            $img_two = $request->file("hover")->store('images/products/hover');
        }

        $files = [];
        if($product->images){
            Storage::delete($product->images);
        }
        $files = '';
        if($request->hasfile('images'))
        {
        //     foreach($request->file('images') as $file)
        //     {
        //         $name = $file->extension();
        //         $file->store('images/products/images',$name);
        //         $files[] = $name;
        //     }
            $files = $request->file("images")->store('images/products/images');
         }

        $params = $request->only(['cat_id','name','slug','small_description','description','regular_price','seller_price','product_quantity']);
        $params['cover'] = $img_one;
        $params['hover'] = $img_two;
        $params['images'] = $files;

        if($product->update($params))
        {
            return redirect()->route('products.index')->with('message', 'Product edited successfull!!');
        }
    }
    public function destroy(Product $product)
    {
        if( Storage::delete($product->cover)){
            if( Storage::delete($product->hover)){
                if( Storage::delete($product->image)){
                    $product->delete();
                }
            }
        }
        return redirect()->route('products.index')->with('message', 'Product deleted successfull!!');
    }
}
