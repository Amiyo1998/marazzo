@extends('frontend.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ route('home')}}">Home</a></li>
				<li class='active'>{{ $title}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class="container">
        <form action="{{ route('place-order')}}" method="POST">
            @csrf
        <div class="row d-flex justify-content-between">
            <div class="col-md-7" style="border: 2px solid rgb(219, 211, 211)">
                        <h4>Basic Details</h4>
                        <hr>
                        <div class="row checkout-form  ">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="number">Phone</label>
                                    <input type="number" class="form-control" id="number" name="number" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="address1">Address 1</label>
                                    <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Address 1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address 2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="zip">Zip code</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Zip">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4" style="border: 2px solid rgb(219, 211, 211); padding-bottom: 10px; ">
                        <h4>Order Details</h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                            @php
                                 $subtotal = 0;
                            @endphp
                            @foreach ($carts as $key=>$cart )
                            <tr>
                                <th>{{ ++$key }}</th>
                                <th>{{$cart->product->name}}</th>
                                <th class="text-center">{{$cart->product_qty}}</th>
                                <th>${{ $cart->product_qty * $cart->price }}.00</th>
                            </tr>
                            @php
                                $subtotal = $subtotal + ($cart->price * $cart->product_qty);
                            @endphp
                            @endforeach
                            @if (session()->has('coupon'))
                            <tr>
                                <th colspan="3">Discount: </th>
                                <th style="background-color: rgb(245, 229, 229)">-${{ session()->get('coupon')['discount_amount'] }}.00({{session()->get('coupon')['coupon_discount']}}%)</th>
                                <input type="hidden" name="coupon_discount" value="{{ session()->get('coupon')['coupon_discount'] }}"><br>
                             </tr>
                            <tr>
                                <th colspan="3">Total: </th>
                                <th>${{ $subtotal - session()->get('coupon')['discount_amount'] }}.00</th>
                                <input type="hidden" name="subtotal" value="{{ $subtotal}}"><br>
                                <input type="hidden" name="total" value="{{ $subtotal - session()->get('coupon')['discount_amount'] }}"><br>
                             </tr>
                             @else
                            <tr>
                               <th colspan="3">Total: </th>
                               <th>${{ $subtotal}}.00</th>
                               <input type="hidden" name="total" value="{{ $subtotal}}"><br>
                               <input type="hidden" name="subtotal" value="{{ $subtotal}}"><br>
                            </tr>
                            @endif
                            </thead>
                        </table>
                        <div>
                            <h4>Select Payment Method</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="handcash" id="handcash" name="payment">
                                <label class="form-check-label" for="handcash"> Hand to Cash</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="bkash" id="bkash" name="payment">
                                <label class="form-check-label" for="bkash">Bkash</label>
                            </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
                    </div>
            </div>
        </form>
    </div>
</div>
<div class="" style="padding: 50px"></div>
@endsection
