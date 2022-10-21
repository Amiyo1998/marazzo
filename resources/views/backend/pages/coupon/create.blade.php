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
                            <li class="breadcrumb-item"><a href="{{ route('coupons.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mx-auto pt-5">
            <form action="{{ route('coupons.store')}}" method="POST">
               @csrf
                <div class="form-group">
                    <label for="coupon_name">Coupon Name:</label>
                    <input type="text" class="form-control @error('coupon_name') is-invalid @enderror"  name="coupon_name" id="coupon_name" value="{{ old('coupon_name')}}">
                    @error('coupon_name')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="coupon_discount">Coupon Discount:</label>
                    <input type="text" class="form-control @error('coupon_discount') is-invalid @enderror" name="coupon_discount" id="coupon_discount" value="{{ old('coupon_discount')}}">
                    @error('coupon_discount')
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <button type="submit" class="btn  btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
