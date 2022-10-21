@extends('frontend.layouts.master')
@section('content')
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible show text-center" role="alert">{{ session('message') }}</div>
    @endif
    <div class="row">
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
                @foreach ($categories as $cat)
                    <li class="dropdown menu-item"> <a href="{{ route('view-category', $cat->id )}}"  ><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $cat->name }}</a></li>
                @endforeach
            </ul>
          </nav>
        </div>
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->

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
                  <div class="sale-offer-tag">
                    <span>49%<br>off</span>
                  </div>
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
                    </div> --}}
                    {{-- <div class="box-wrapper">
                      <div class="minutes box">
                        <span class="key">36</span>
                        <span class="value">MINS</span>
                      </div>
                    </div> --}}
                    {{-- <div class="box-wrapper">
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

        <!-- ============================================== SPECIAL OFFER ============================================== -->

        <div class="sidebar-widget outer-bottom-small">
          <h3 class="section-title">Special Offer</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                <div class="products special-product">
                @foreach ($slidProducts as $slidProduct)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image">
                                <a href="{{ route('view-product',$slidProduct->id)}}"> <img src="{{ asset('storage/'.$slidProduct->cover)}}" alt=""> </a>
                            </div>
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
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
                            <div class="product-price"> <span class="price">${{ $slidProduct->seller_price}}.00 </span> </div>
                            <!-- /.product-price -->
                          </div>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-micro-row -->
                    </div>
                    <!-- /.product-micro -->
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->
        <!-- ============================================== PRODUCT TAGS ============================================== -->
        <div class="sidebar-widget product-tag">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">
                @foreach ($categories as $cat)
                    <a class="item" title="{{ $cat->name }}" href="{{ route('view-category', $cat->id )}}"  >{{ $cat->name }}</a>
                @endforeach
            </div>
            <!-- /.tag-list -->
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== PRODUCT TAGS : END ============================================== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->
        <div class="sidebar-widget outer-bottom-small">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">
                    @foreach ($slidProducts as $slidProduct)
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image">
                                  <a href="{{ route('view-product',$slidProduct->id)}}"> <img src="{{ asset('storage/'.$slidProduct->cover)}}" alt=""> </a>
                              </div>
                            </div>
                            <!-- /.product-image -->
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
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
                              <div class="product-price"> <span class="price">${{ $slidProduct->seller_price}}.00 </span> </div>
                              <!-- /.product-price -->
                            </div>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.product-micro-row -->
                      </div>
                      <!-- /.product-micro -->
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== SPECIAL DEALS : END ============================================== -->
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter outer-bottom-small">
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
          </div>
          <!-- /.sidebar-widget-body -->
        </div>
        <!-- /.sidebar-widget -->
        <!-- ============================================== NEWSLETTER: END ============================================== -->
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget outer-top-vs ">
          <div id="advertisement" class="advertisement">
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member1.png')}}" alt="Image"></div>
              <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">John Doe <span>Abc Company</span> </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member3.png')}}" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">Stephen Doe <span>Xperia Designs</span> </div>
            </div>
            <!-- /.item -->
            <div class="item">
              <div class="avatar"><img src="{{ asset('frontend/images/testimonials/member2.png')}}" alt="Image"></div>
              <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer. Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat.<em>"</em></div>
              <div class="clients_author">Saraha Smith <span>Datsun &amp; Co</span> </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
          </div>
          <!-- /.owl-carousel -->
        </div>
        <!-- ============================================== Testimonials: END ============================================== -->
      </div>
      <!-- /.sidemenu-holder -->
      <!-- ============================================== SIDEBAR : END ============================================== -->

      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
        <!-- ========================================== SECTION – HERO ========================================= -->

        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            @foreach ($sliders as $slider)
            <div class="item" style="background-image: url({{ asset('storage/'.$slider->image)}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{ $slider->title }}</div>
                  <div class="big-text fadeInDown-1"> {{ $slider->sub_title }} </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="{{ $slider->url }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
            <!-- /.item -->
            @endforeach
          </div>
          <!-- /.owl-carousel -->
        </div>
        <!-- ========================================= SECTION – HERO : END ========================================= -->
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            {{-- <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                <li class="active"><a data-transition-type="backSlide" href="" data-toggle="tab">All</a></li>
              @foreach ($slide_category as $cat)
                <li><a data-transition-type="backSlide" href="#{{ $cat->id}}" data-toggle="tab">{{  $cat->name }}</a></li>
              @endforeach
            </ul> --}}
            <!-- /.nav-tabs -->
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" ">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                @foreach ($products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                     <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="{{ route('view-product',$product->id)}}">
                                <img src="{{ asset('storage/'.$product->cover)}}" alt="">
                                <img src="{{ asset('storage/'.$product->hover)}}" alt="" class="hover-image">
                            </a>
                          </div>
                          <!-- /.image -->
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
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
                          <div class="product-price"> <span class="price">$ {{ $product->seller_price}} </span> <span class="price-before-discount">$ {{ $product->regular_price}} </span> </div>
                        </div>
                        <!-- /.product-info -->
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
                                {{-- <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> --}}
                                    <button data-toggle="tooltip" class="btn btn-primary icon " style="border-radius: 50%; height:43px"   type="submit" title="Wishlist"> <i class="icon fa fa-heart "></i> </button>
                                </form>
                            </li>
                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  @endforeach
                </div>
                <!-- /.home-owl-carousel -->
              </div>
              <!-- /.product-slider -->
            </div>
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.scroll-tabs -->
        <!-- ============================================== SCROLL TABS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners outer-bottom-xs">
          <div class="row">
            @foreach ($banners as $banner)
            <div class="col-md-4 col-sm-4">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="{{ asset('storage/'.$banner->image)}}" alt=""> </div>
                </div>
            </div>
            @endforeach
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->

        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product">
        <div class="row">
        <div class="col-lg-3">
          <h3 class="section-title">Categories</h3>
          <ul class="sub-cat">
            @foreach ($categories as $cat)
                <li><a href="{{ route('view-category', $cat->id )}}">{{ $cat->name }}</a></li>
            @endforeach
          </ul>
          </div>
          <div class="col-lg-9">
          <div class="owl-carousel homepage-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach ($products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                     <div class="product">
                        <div class="product-image">
                          <div class="image">
                            <a href="{{ route('view-product',$product->id)}}">
                                <img src="{{ asset('storage/'.$product->cover)}}" alt="">
                                <img src="{{ asset('storage/'.$product->hover)}}" alt="" class="hover-image">
                            </a>
                          </div>
                          <!-- /.image -->
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
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
                          <div class="product-price"> <span class="price">$ {{ $product->seller_price}} </span> <span class="price-before-discount">$ {{ $product->regular_price}} </span> </div>
                        </div>
                        <!-- /.product-info -->
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
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                      </div>
                      <!-- /.product -->
                    </div>
                    <!-- /.products -->
                  </div>
                  <!-- /.item -->
                  @endforeach
          </div>
          </div>
          </div>
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners outer-bottom-xs">
          <div class="row">
            <div class="col-md-8">
              <div class="wide-banner1 cnt-strip">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner.jpg')}}" alt="">
                </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">Amazing Sunglasses<br>
                      <span class="shopping-needs">Get 40% off on selected items</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="wide-banner cnt-strip">
                <div class="image">
                    <img class="img-responsive" src="{{ asset('frontend/images/banners/home-banner4.jpg')}} " alt="">
                </div>
                <!-- /.new-label -->
              </div>
              <!-- /.wide-banner -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section new-arriavls">
          <h3 class="section-title">Featured Products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach ($products as $product)
            <div class="item item-carousel">
              <div class="products">
               <div class="product">
                  <div class="product-image">
                    <div class="image">
                      <a href="{{ route('view-product',$product->id)}}">
                          <img src="{{ asset('storage/'.$product->cover)}}" alt="">
                          <img src="{{ asset('storage/'.$product->hover)}}" alt="" class="hover-image">
                      </a>
                    </div>
                    <!-- /.image -->
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
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
                    <div class="product-price"> <span class="price">$ {{ $product->seller_price}} </span> <span class="price-before-discount">$ {{ $product->regular_price}} </span> </div>
                  </div>
                  <!-- /.product-info -->
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
                        <li class="wishlist">
                            <form action="{{ route('wishlists.store',$product->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button data-toggle="tooltip" class="btn btn-primary icon " style="border-radius: 50%; height:43px"   type="submit" title="Wishlist"> <i class="icon fa fa-heart "></i> </button>
                            </form>
                        </li>
                        <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action -->
                  </div>
                  <!-- /.cart -->
                </div>
                <!-- /.product -->
              </div>
              <!-- /.products -->
            </div>
            <!-- /.item -->
            @endforeach
          </div>
          <!-- /.home-owl-carousel -->
        </section>
        <!-- /.section -->
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

      </div>
      <!-- /.homebanner-holder -->
      <!-- ============================================== CONTENT : END ============================================== -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->
@endsection
