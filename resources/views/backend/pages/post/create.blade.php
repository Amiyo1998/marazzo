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
                            <li class="breadcrumb-item"><a href="{{ route('posts.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('posts.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title')}}">
                    @error('title')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cat_id">Category Select:</label>
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
                    <label for="short_description">Short Description</label>
                    <input type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" id="short_description" value="{{ old('short_description')}}">
                    @error('short_description')
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
                    <label for="image">Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ old('image')}}">
                    @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag_id">Tag</label>
                    @foreach ($tags as $tag)
                        <div class="col-sm-9 ">
                        <input type="checkbox" id="tag_id{{ $tag->id}}" name="tags[]" value="{{ $tag->id}}">
                        <label for="tag_id{{ $tag->id}}"> {{ $tag->name}}</label>
                        </div>
                    @endforeach
                    @error('tag_id')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn  btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
