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
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible show text-center" role="alert">{{ session('message') }}</div>
        @endif
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">My Wishlist</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($wishlists->count())
                                @foreach ($wishlists as $wishlist)
                                <tr>
                                    <td class="col-md-2 col-sm-6 col-xs-6"><img src="{{ asset('storage/'.$wishlist->product->cover)}}" alt="imga"></td>
                                    <td class="col-md-7 col-sm-6 col-xs-6">
                                        <div class="product-name"><a href="#">{{ $wishlist->product->name }}</a></div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                        <div class="price">
                                            {{ $wishlist->product->seller_price }}
                                            <span>${{ $wishlist->product->regular_price }}.00</span>
                                        </div>
                                    </td>
                                    <td class="col-md-2 ">
                                        <form action="{{ route('carts.store',$wishlist->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$wishlist->product->id}}">
                                            <input type="hidden"  name="price" value="{{ $wishlist->product->seller_price}}">
                                            <input type="number" style="display: none" value="1" name="product_qty">
                                            <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                        </form>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <form action="{{ route('wishlists.destroy',$wishlist->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="display: inline-block; border:none; font-size:16px;" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="p-3 mb-2 bg-warning text-dark text-center"><h4>Wishlist Empty!!!</h4></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div><!-- /.row -->
    </div><!-- /.sigin-in-->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection
