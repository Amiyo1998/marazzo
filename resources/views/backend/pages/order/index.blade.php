@extends('backend.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('orders.index')}}">{{ $title }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="border ">
                            <th class="border ">ID</th>
                            <th class="border ">Invoice No</th>
                            <th class="border ">Payment Type</th>
                            <th class="border ">Sub Total</th>
                            <th class="border ">Coupon Discount</th>
                            <th class="border ">Total</th>
                            <th class="border ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key=>$order)
                        <tr class="border border-5">
                            <td class="border border-5">{{ ++$key }}</td>
                            <td class="border border-5">#{{ $order->invoice_no }}</td>
                            <td class="border border-5">{{ $order->payment }}</td>
                            <td class="border border-5">${{ $order->subtotal }}.00</td>
                            @if ($order->coupon_discount == NULL)
                            <td class="border border-5">No</td>
                            @else
                            <td class="border border-5">{{ $order->coupon_discount }}%</td>
                            @endif

                            <td class="border border-5">${{ $order->total }}.00</td>
                            <td class="border border-5">
                                <a href="{{ route('orders.show',$order->id)}}"><i class="fa fa-eye bg-primary text-light px-2 py-2" aria-hidden="true" style="font-size: 17px;"></i></a>
                                {{-- <form action="{{ route('orders.destroy',$order->id)}}" method="POST" class="d-inline-block border rounded-3 ">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fs-4 fw-bold text-light px-2 py-1" onclick="return confirm('Are you sure to delete?');"><i class="fas fa-trash-alt"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
