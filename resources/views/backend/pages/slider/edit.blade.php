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
                            <li class="breadcrumb-item"><a href="{{ route('sliders.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('sliders.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
               @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" value="{{ $slider->title }}">
                    @error('title')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sub_title">Sub Title:</label>
                    <input type="text" class="form-control  @error('sub_title') is-invalid @enderror" name="sub_title" id="sub_title" value="{{ $slider->sub_title }}">
                    @error('sub_title')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description" id="description" value="{{ $slider->description }}">
                    @error('description')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">URL:</label>
                    <input type="text" class="form-control  @error('url') is-invalid @enderror" name="url" id="url" value="{{ $slider->url}}">
                    @error('url')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="image"">
                    <img src="{{ asset('storage/'.$slider->image) }}" alt="" width="80px" height="50px">
                    @error('image')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn  btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
