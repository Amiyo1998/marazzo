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
        <h4 style="background-color:rgb(168, 214, 214); padding:50px 20px;" class="p-3 mb-2 bg-warning text-dark text-center">Order Complete</h4>
        {{-- <div class="row">
            <div class="col-md-4">
                <div class="bg-primary"> Home</div>
                <div class="bg-primary">My Order</div>
                <div class="bg-primary">Logiut</div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <h4>Order List</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Invoice No</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>#{{ $order->invoice_no }}</th>
                        <th>{{ $order->payment }}</th>
                        <th>${{ $order->subtotal }}.00</th>
                        <th>${{ $order->total }}</th>
                    </tr>
                    </thead>
                </table>
            </div>

        </div> --}}
    </div>
</div>
@endsection
