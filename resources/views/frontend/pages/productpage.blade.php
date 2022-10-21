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
				<li><a href="{{ route('view-category',$categories->id)}}">{{ $categories->name}}</a></li>
				<li class='active'>{{ $products->name}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible show text-center" role="alert">{{ session('message') }}</div>
        @endif
		<div class='row single-product'>
			<div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
				<div class="sidebar-module-container">
				<div class="home-banner outer-top-n outer-bottom-xs">
                    <img src="{{ asset('frontend/images/banners/LHS-banner.jpg')}}" alt="Image">
                </div>
    	<!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

            @foreach ($slidProducts as $slidProduct)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image">
                  <a href="{{ route('view-product',$slidProduct->id)}}">
                  <img src="{{ asset('storage/'.$slidProduct->cover)}}" alt="">
                  <img src="{{ asset('storage/'.$slidProduct->hover)}}" alt="" class="hover-image">
                  </a>
                  </div>
                  <div class="sale-offer-tag"><span>49%<br>
                    off</span></div>
                  <div class="timing-wrapper tick" data-did-init="handleTickInit">
                    <div class="box-wrapper" data-repeat="true" data-layout="horizontal center fit" data-transform="preset(d, h, m, s) -> delay">
                      <div class="date box tick-group">
                        <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                            <span data-view="flip"></span>
                        </div>
                        <span data-key="label" data-view="text"class="tick-label"></span>
                        {{-- <span class="key">120</span>
                        <span class="value">DAYS</span> --}}
                    </div>
                    </div>
                    {{-- <div class="box-wrapper">
                      <div class="hour box">
                        <span class="key">20</span>
                        <span class="value">HRS</span>
                    </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box">
                        <span class="key">36</span>
                        <span class="value">MINS</span>
                    </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="seconds box">
                        <span class="key">60</span>
                        <span class="value">SEC</span>
                    </div>
                    </div> --}}
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="{{ route('view-product',$slidProduct->id)}}">{{ $slidProduct->name}}</a></h3>
                  <div>
                    @php
                        $rating_sum = $slidProduct->rating->sum('star_rating');
                        $rating_value = $rating_sum / $slidProduct->rating->count();
                        $ratenum = number_format($rating_value);
                    @endphp
                    <div class="">
                        @for ($i = 1; $i<=$ratenum; $i++)
                            <span style="color: #FFC808"><i class="fa fa-star"></i></span>
                        @endfor
                        @for ($j = $ratenum+1; $j<=5; $j++)
                            <span ><i class="fa fa-star"></i></span>
                        @endfor
                        ({{$slidProduct->rating->count()}})
                    </div>
                  </div>
                  <div class="product-price"> <span class="price"> ${{ $slidProduct->seller_price}}.00 </span> <span class="price-before-discount">${{ $slidProduct->regular_price}}.00</span> </div>
                  <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                        <form action="{{ route('carts.store',$slidProduct->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$slidProduct->id}}">
                            <input type="hidden"  name="price" value="{{ $slidProduct->seller_price}}">
                            <input type="number" style="display: none" value="1" name="product_qty">
                            <button class="btn btn-primary icon"  type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                        </form>
                    </div>
                  </div>
                  <!-- /.action -->
                </div>
                <!-- /.cart -->
              </div>
            </div>
            @endforeach
          </div>
          <!-- /.sidebar-widget -->
        </div>
<!-- ============================================== HOT DEALS: END ============================================== -->

<!-- ============================================== NEWSLETTER ============================================== -->
<div class="sidebar-widget newsletter outer-bottom-small outer-top-vs">
	<h3 class="section-title">Newsletters</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<p>Sign Up for Our Newsletter!</p>
        <form>
        	 <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
			  </div>
			<button class="btn btn-primary">Subscribe</button>
		</form>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== NEWSLETTER: END ============================================== -->

<!-- ============================================== Testimonials============================================== -->
<div class="sidebar-widget  outer-top-vs ">
	<div id="advertisement" class="advertisement">
        <div class="item">
            <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member1.png')}}" alt="Image"></div>
		        <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		        <div class="clients_author">John Doe	<span>Abc Company</span></div><!-- /.container-fluid -->
            </div><!-- /.item -->
            <div class="item">
         	    <div class="avatar"><img src="assets/images/testimonials/member3.png" alt="Image"></div>
		        <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		        <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
            </div><!-- /.item -->
        <div class="item">
            <div class="avatar"><img src="assets/images/testimonials/member2.png" alt="Image"></div>
		    <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
		    <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
        </div><!-- /.item -->
    </div><!-- /.owl-carousel -->
</div>
<!-- ============================================== Testimonials: END ============================================== -->
</div>
</div><!-- /.sidebar -->
	<div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
        <div class="detail-block">
			<div class="row">
		        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">
                    <div id="owl-single-product">
                        <div class="single-product-gallery-item" id="slide1">
                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/'.$products->cover) }}">
                                <img class="img-responsive" alt="" src="{{ asset('storage/'.$products->cover) }}" data-echo="{{ asset('storage/'.$products->cover)}}" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->
                        <div class="single-product-gallery-item" id="slide2">
                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/'.$products->hover)}}">
                                <img class="img-responsive" alt="" src="{{ asset('storage/'.$products->hover)}}" data-echo="{{ asset('storage/'.$products->hover)}}" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->

                        <div class="single-product-gallery-item" id="slide3">
                            <a data-lightbox="image-1" data-title="Gallery" href="{{ asset('storage/'.$products->images)}}">
                                <img class="img-responsive" alt="" src="{{ asset('storage/'.$products->images)}}" data-echo="{{ asset('storage/'.$products->images)}}" />
                            </a>
                        </div><!-- /.single-product-gallery-item -->

                        </div><!-- /.single-product-slider -->
                        <div class="single-product-gallery-thumbs gallery-thumbs">
                            <div id="owl-single-product-thumbnails">
                                <div class="item">
                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                                        <img class="img-responsive" alt="" src="{{ asset('storage/'.$products->cover)}}" data-echo="{{ asset('storage/'.$products->cover)}}" />
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                        <img class="img-responsive" alt="" src="{{ asset('storage/'.$products->hover)}}" data-echo="{{ asset('storage/'.$products->hover)}}"/>
                                    </a>
                                </div>
                                <div class="item">
                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                        <img class="img-responsive" alt="" src="{{ asset('storage/'.$products->images)}}" data-echo="{{ asset('storage/'.$products->images)}}" />
                                    </a>
                                </div>
                            </div><!-- /#owl-single-product-thumbnails -->
                        </div><!-- /.gallery-thumbs -->
                    </div><!-- /.single-product-gallery -->
                </div><!-- /.gallery-holder -->
					<div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
						<div class="product-info">
							<h1 class="name" >{{ $products->name}}</h1>
							<div class="rating-reviews m-t-20">
								<div class="row">
                  <div class="col-lg-12">
                    {{-- @foreach ($products->rating as $rate) --}}
                    <div class="pull-left">
                        @php
                            $rating_value = $rating_sum / $ratings->count();
                            $ratenum = number_format($rating_value);
                        @endphp
                        <div class="">
                            @for ($i = 1; $i<=$ratenum; $i++)
                            <span style="color: #FFC808"><i class="fa fa-star"></i></span>
                            @endfor
                            @for ($j = $ratenum+1; $j<=5; $j++)
                            <span ><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                    </div>
                    <div class="pull-left">
                      <div class="reviews">
                        <span>( {{ $ratings->count() }} Reviews)</span>
                      </div>
                    </div>
                    {{-- @endforeach --}}
                  </div>
				</div><!-- /.row -->
			</div><!-- /.rating-reviews -->
			<div class="stock-container info-container m-t-10">
				<div class="row">
                  <div class="col-lg-12">
                    <div class="pull-left">
                      <div class="stock-box">
                        <span class="label">Availability :</span>
                      </div>
                    </div>
                    <div class="pull-left">
                      <div class="stock-box">
                          @if ($products->product_quantity > 0)
                            <span class="value">In Stock</span>
                          @else
                            <span class="value">Out of Stock</span>
                          @endif
                      </div>
                    </div>
                  </div>
				</div><!-- /.row -->
			</div><!-- /.stock-container -->
			<div class="description-container m-t-20">
				<p>{{ $products->small_description }}</p>
			</div><!-- /.description-container -->
			<div class="price-container info-container m-t-30">
				<div class="row">
					<div class="col-sm-6 col-xs-6">
						<div class="price-box">
							<span class="price">${{ $products->seller_price}}.00</span>
							<span class="price-strike">${{ $products->regular_price}}.00</span>
						</div>
					</div>
					<div class="col-sm-6 col-xs-6">
						<div class="favorite-button m-t-5" >
                        <form action="{{ route('wishlists.store',$products->id)}}" method="POST" style="display:inline-block">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$products->id}}">
                            <button data-toggle="tooltip" class="btn btn-primary icon " style="border-radius: 50%; height:43px"   type="submit" title="Wishlist"> <i class="icon fa fa-heart "></i> </button>
                        </form>
							<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
								<i class="fa fa-signal"></i>
							</a>
							<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
								<i class="fa fa-envelope"></i>
							</a>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.price-container -->
				<div class="quantity-container info-container">
								<div class="row">
									<div class="qty">
										<span class="label">Qty :</span>
									</div>
                                    <form action="{{ route('carts.store',$products->id)}}" method="POST">
                                        @csrf
                                        <div class="qty-count">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    {{-- <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div> --}}
                                                    <input type="number" value="1" name="product_qty" class="@error('product_qty') is-invalid @enderror">
                                                        @error('product_qty')
                                                            <strong class="text-danger">{{ $message }}</strong>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" class="@error('product_id') is-invalid @enderror" name="product_id" value="{{ $products->id}}">
                                        <input type="hidden"  name="price" value="{{ $products->seller_price}}">
                                        @error('product_id')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                        <div class="add-btn">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i>ADD TO CARD</button>
                                            {{-- <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a> --}}
                                        </div>
                                    </form>
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				<div class="product-tabs inner-bottom-xs">
					<div class="row">
						<div class="col-sm-12 col-md-3 col-lg-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-12 col-md-9 col-lg-9">
							<div class="tab-content">
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">{{ $products->description }}</p>
									</div>
								</div><!-- /.tab-pane -->
                                <form action="{{ route('rating',$products->id )}}" method="POST" class="cnt-form">
                                    @csrf
								<div id="review" class="tab-pane">
									<div class="product-tab">
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
										</div><!-- /.product-reviews -->
                                        <div class="form-group row">
                                            <div class=" col-sm-6">
                                               <input class="form-control" type="text" name="name" placeholder="Name" maxlength="40" />
                                            </div>
                                            <div class="col-sm-6">
                                               <input class="form-control" type="email" name="email" placeholder="Email" maxlength="80" />
                                            </div>
                                         </div>
										<div class="product-add-review">
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">
                                                        <input type="hidden" name="product_id" value="{{ $products->id}}">
                                                        {{--<label for="star_rating">Review</label>
                                                         <input type="text" name="star_rating" value=""> --}}
                                                        <div class="col-sm-6">
                                                            <div class="rate">
                                                               <input type="radio" id="star5" class="rate" name="star_rating" value="5"/>
                                                               <label for="star5" title="text">5 stars</label>
                                                               <input type="radio" id="star4" class="rate" name="star_rating" value="4"/>
                                                               <label for="star4" title="text">4 stars</label>
                                                               <input type="radio" id="star3" class="rate" name="star_rating" value="3"/>
                                                               <label for="star3" title="text">3 stars</label>
                                                               <input type="radio" id="star2" class="rate" name="star_rating" value="2">
                                                               <label for="star2" title="text">2 stars</label>
                                                               <input type="radio" id="star1" class="rate" name="star_rating" value="1"/>
                                                               <label for="star1" title="text">1 star</label>
                                                            </div>
                                                         </div>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											<div class="review-form">
												<div class="form-container">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="exampleInputReview">Message <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" name="message" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->
													<!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->
										</div><!-- /.product-add-review -->
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
                            </form>
							</div><!-- /.tab-content -->
						</div><!-- /.col -->

					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product">
    <div class="row">
        <div class="col-lg-3">
            <h3 class="section-title">Upsell Products</h3>
            <div class="ad-imgs">
                <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner1.jpg')}}" alt="">
                <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner2.jpg')}}" alt="">
            </div>
        </div>
        <div class="col-lg-9">
            <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                @foreach ($prods as $product)
                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    <a href="{{ route('view-product',$product->id)}}"><img  src="{{ asset('storage/'.$product->cover)}}" alt=""></a>
                                </div><!-- /.image -->
                                <div class="tag sale"><span>sale</span></div>
                            </div><!-- /.product-image -->
                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('view-product',$product->id)}}">{{ $product->name}}</a></h3>
                                <div>
                                    @php
                                        $rating_sum = $product->rating->sum('star_rating');
                                        $rating_value = $rating_sum / $product->rating->count();
                                        $ratenum = number_format($rating_value);
                                    @endphp
                                    <div class="">
                                        @for ($i = 1; $i<=$ratenum; $i++)
                                            <span style="color: #FFC808"><i class="fa fa-star"></i></span>
                                        @endfor
                                        @for ($j = $ratenum+1; $j<=5; $j++)
                                            <span ><i class="fa fa-star"></i></span>
                                        @endfor
                                        ({{$product->rating->count()}})
                                    </div>
                                </div>
                                <div class="description"></div>
                                <div class="product-price">
                                    <span class="price">${{ $product->seller_price}}</span>
                                    <span class="price-before-discount">${{ $product->regular_price}}</span>
                                </div><!-- /.product-price -->
                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                        <li class="add-cart-button btn-group">
                                            <form action="{{ route('carts.store',$product->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden"  name="price" value="{{ $product->seller_price}}">
                                                <input type="number" style="display: none" value="1" name="product_qty">
                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                            </form>
                                        </li>
                                        <li class=" wishlist">
                                            <form action="{{ route('wishlists.store',$product->id)}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <button data-toggle="tooltip" class="btn btn-primary icon " style="border-radius: 50%; height:43px"   type="submit" title="Wishlist"> <i class="icon fa fa-heart "></i> </button>
                                            </form>
                                        </li>
                                        <li class="lnk">
                                            <a class="add-to-cart" href="detail.html" title="Compare">
                                                <i class="fa fa-signal"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div><!-- /.product -->
                    </div><!-- /.products -->
                </div><!-- /.item -->
                @endforeach
            </div><!-- /.home-owl-carousel -->
        </div>
    </div>
</section><!-- /.section -->
</div><!-- /.col -->
<div class="clearfix"></div>
</div><!-- /.row -->
</div><!-- /.body-content -->
@endsection
