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
                            <li class="breadcrumb-item"><a href="{{ route('coupons.index')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('coupons.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('coupons.update', $coupon->id)}}" method="POST" enctype="multipart/form-data">
               @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="coupon_name">Tag Name:</label>
                    <input type="text" class="form-control" name="coupon_name" id="coupon_name" value="{{ $coupon->coupon_name }}">
                </div>
                <div class="form-group">
                    <label for="coupon_discount">Tag Name:</label>
                    <input type="text" class="form-control" name="coupon_discount" id="coupon_discount" value="{{ $coupon->coupon_discount }}">
                </div>
                <button type="submit" class="btn  btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
