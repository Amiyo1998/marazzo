@extends('backend.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="container">
    <div class="row card-header">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('products.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('products.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name')}}">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">{{ __("Category Select")}}</label>
                    <div class="col-sm-9 form-control">
                        <select name="cat_id" id="cat_id" class="form-control-plaintext @error('cat_id') is-invalid @enderror" >
                            <option value="" >{{ __("Select category")}}</option>
                            @foreach ($categories as $cat )
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                      @error('cat_id')
                          <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>
                </div>
                {{-- <div class="form-group">

                    <label for="subcat_id">{{ __("Sub-Category Select")}}</label>
                    <div class="col-sm-9 form-control">
                        <select name="subcat_id" id="subcat_id" class="form-control-plaintext @error('subcat_id') is-invalid @enderror" >
                            <option value="" >{{ __("Select Sub-category")}}</option>
                            @foreach ($subCategories as $subcat )
                            <option value="">{{ $subcat->name}}</option>
                            @endforeach
                        </select>
                      @error('subcat_id')
                          <strong class="text-danger">{{ $message }}</strong>
                      @enderror
                    </div>

                </div> --}}
                <div class="form-group">
                    <label for="slug">Slug Name:</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug')}}">
                    @error('slug')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="small_description">Small Description</label>
                    <input type="text" class="form-control @error('small_description') is-invalid @enderror" name="small_description" id="small_description" value="{{ old('small_description')}}">
                    @error('small_description')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description')}}">
                    @error('description')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="regular_price">Orginal Price</label>
                    <input type="text" class="form-control @error('regular_price') is-invalid @enderror" name="regular_price" id="regular_price" value="{{ old('regular_price')}}">
                    @error('regular_price')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="seller_price">Seller Price</label>
                    <input type="text" class="form-control @error('seller_price') is-invalid @enderror" name="seller_price" id="seller_price" value="{{ old('seller_price')}}">
                    @error('seller_price')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover">Cover Image:</label>
                    <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" id="cover" value="{{ old('cover')}}">
                    @error('cover')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hover">Hover Image:</label>
                    <input type="file" class="form-control @error('hover') is-invalid @enderror" name="hover" id="hover" value="{{ old('hover')}}">
                    @error('hover')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="images">Image:</label>
                    <input type="file" class="form-control @error('images') is-invalid @enderror" name="images" id="images" value="{{ old('images')}}">
                    @error('images')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="product_quantity">Quantity:</label>
                    <input type="text" class="form-control @error('product_quantity') is-invalid @enderror" name="product_quantity" id="product_quantity" value="{{ old('product_quantity')}}">
                    @error('product_quantity')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn  btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
