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
                            <li class="breadcrumb-item"><a href="{{ route('banners.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('banners.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{ old('image')}}">
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
