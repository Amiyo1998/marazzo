@extends('backend.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{route('orders.index')}}">{{ $title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Shipping Table</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Email">First Name</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->fname }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Email">Last Name</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->lname }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Email">Email address</label>
                                        <input type="email" class="form-control form-control-sm" value="{{ $shipping->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Number</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->number }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Country</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->country }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">State</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->state }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">City</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->city }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Zip Code</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->zip }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Address 1</label>
                                        <input type="text" class="form-control form-control-sm" value="{{ $shipping->address1 }}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">Address 2</label>
                                        <input type="text" class="form-control form-control-sm " value="{{ $shipping->address2 }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <div>
                            <h5>Order List</h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr class="border ">
                                    <th class="border ">ID</th>
                                    <th class="border ">Invoice No</th>
                                    <th class="border ">Payment Type</th>
                                    <th class="border ">Sub Total</th>
                                    <th class="border ">Coupon Discount</th>
                                    <th class="border ">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border border-5">
                                    <td class="border border-5"> # </td>
                                    <td class="border border-5">#{{ $order->invoice_no }}</td>
                                    <td class="border border-5">{{ $order->payment }}</td>
                                    <td class="border border-5">${{ $order->subtotal }}.00</td>
                                    @if ($order->coupon_discount == NULL)
                                    <td class="border border-5">No</td>
                                    @else
                                    <td class="border border-5">{{ $order->coupon_discount }}%</td>
                                    @endif
                                    <td class="border border-5">${{ $order->total }}.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <div>
                            <h5>Order Item</h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr class="border border-5">
                                    <th class="border border-5">Image</th>
                                    <th class="border border-5">Product Name</th>
                                    <th class="border border-5">Quantity</th>
                                    <th class="border border-5">Price</th>
                                </tr>
                                @foreach ($orderItems as $orderItem)
                                <tr class="border border-5">
                                    <th class="border border-5"><img src="{{ asset('storage/'.$orderItem->product->cover) }}" alt="" width="50px" height="30px"></th>
                                    <th class="border border-5">{{ $orderItem->product->name }}</th>
                                    <th class="border border-5">{{ $orderItem->product_qty }}</th>
                                    <th class="border border-5">${{ $orderItem->product->seller_price * $orderItem->product_qty }}.00</th>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
