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
                            <li class="breadcrumb-item"><a href="{{ route('subcategories.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('subcategories.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
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
                <div class="form-group">
                    <label for="name">Sub-Category Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name')}}">
                    @error('name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn  btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
