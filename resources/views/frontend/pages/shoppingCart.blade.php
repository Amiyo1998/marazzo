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
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible  show text-center" role="alert">{{ session('message') }}</div>
        @endif
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	    <div class="table-responsive">
		    <table class="table">
			    <thead>
                    <tr>
                        <th class="cart-romove item">Remove</th>
                        <th class="cart-description item">Image</th>
                        <th class="cart-product-name item">Product Name</th>
                        {{-- <th class="cart-edit item">Edit</th> --}}
                        <th class="cart-qty item">Quantity</th>
                        <th class="cart-sub-total item">Total</th>
                        <th class="cart-total last-item">Subtotal</th>
                    </tr>
                </thead><!-- /thead -->
			<tbody>
                @php
                    $subtotal = 0;
                @endphp
                @if ($carts->count())
                @foreach ($carts as $cart)
				<tr>
					<td class="romove-item">
                        <form action="{{ route('carts.destroy',$cart->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="display: inline-block; border:none; font-size:16px;" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="#">
						    <img src="{{ asset('storage/'.$cart->product->cover)}}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'>{{ $cart->product->name }}</h4>
						<div class="row">
							<div class="col-sm-12">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-12">
								<div class="reviews">
									(06 Reviews)
								</div>
							</div>
						</div><!-- /.row -->
						{{-- <div class="cart-product-info">
											<span class="product-color">COLOR:<span>Blue</span></span>
						</div> --}}
					</td>
					{{-- <td class="cart-product-edit"><a href="{{ route('carts.update',$cart->id)}}" class="product-edit">Edit</a></td> --}}
                    <form action="{{ route('carts.update',$cart->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <td class="cart-product-quantity">
                            <div class="quant-input">
                                <div class="pro-qty">
                                    <input type="number" name="product_qty" value="{{ $cart->product_qty }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary fs-4 fw-bold text-light px-2 py-1" >Update</i></button>
                        </td>
                    </form>

					<td class="cart-product-sub-total"><span class="cart-sub-total-price">${{ $cart->price }}.00</span></td>
					<td class="cart-product-grand-total"><span class="cart-grand-total-price">${{ $cart->price * $cart->product_qty }}.00</span></td>
				</tr>
                @php
                    $subtotal = $subtotal + ($cart->price * $cart->product_qty);
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="p-3 mb-2 bg-warning text-dark text-center"><h4>Cart Empty!!!</h4></td>
                </tr>
                @endif
			</tbody><!-- /tbody -->

            <tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{ route('home')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
		</table><!-- /table -->
	</div>
</div><!-- /.shopping-cart-table -->
@if ($carts->count())
<div class="col-md-4 col-sm-12 estimate-ship-tax">
    @if (session()->has('coupon'))
    @else
	<table class="table">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
                    <form action="{{ route('apply-coupon')}}" method="POST">
                        @csrf
						<div class="form-group">
							<input type="text" name="coupon_name" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
                    </form>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
    @endif
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
</div>
<div class="col-md-4 col-sm-12 cart-shopping-total">
    <h4 style="padding: 10px; font-weight:bold;">Cart Total</h4>
	<table class="table">
		<thead>
			<tr>
				<th class="row">
                    @if (session()->has('coupon'))
					<div class="cart-sub-total">
                       Subtotal:<span class="inner-left-md">${{ $subtotal }}.00</span>
                    </div>
                    <div class="cart-sub-total">
                        Coupon: <span class="inner-left-md" style="text-transform: uppercase; ">{{ session()->get('coupon')['coupon_name'] }} <a href="{{ route('apply-destroy')}}"  style="color: red;"><i class="fa fa-times" aria-hidden="true"></i></a> </span>
                    </div>
                    <div class="cart-sub-total">
                        Discount: <span class="inner-left-md">{{ session()->get('coupon')['coupon_discount'] }}%(${{ session()->get('coupon')['discount_amount'] }})</span>
                    </div>
                    <div class="cart-grand-total">
                       Total:<span class="inner-left-md">${{ $subtotal - session()->get('coupon')['discount_amount']}}.00</span>
                    </div>
                    @else
                    <div class="cart-grand-total">
						Total:<span class="inner-left-md">${{ $subtotal }}.00</span>
					</div>
                    @endif
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{ route('checkout')}}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->
@endif
</div><!-- /.shopping-cart -->
</div> <!-- /.row -->
</div>
@endsection
