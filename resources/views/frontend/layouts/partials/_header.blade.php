<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li class="myaccount"><a href="#"><span>My Account</span></a></li>
              <li class="wishlist"><a href="{{ route('wishlists.index')}}"><span>Wishlist</span></a></li>
              <li class="header_cart hidden-xs"><a href="{{ route('carts.index')}}"><span>My Cart</span></a></li>
              <li class="check"><a href="#"><span>Checkout</span></a></li>
              <li class="login"><a href="#"><span>Login</span></a></li>
            </ul>
          </div>
          <!-- /.cnt-account -->

          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-small lang"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">English</a></li>
                  <li><a href="#">French</a></li>
                  <li><a href="#">German</a></li>
                </ul>
              </li>
            </ul>
            <!-- /.list-unstyled -->
          </div>
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{ route('home')}}"> <img src="{{ asset('frontend/images/logo.png')}}" alt="logo"> </a> </div>
            <!-- /.logo -->
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->

          <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">
            <!-- /.contact-row -->
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        @php
                            $categories = App\Models\Category::latest()->get();
                        @endphp
                        @foreach ($categories as $cat)
                            <li class="dropdown yamm mega-menu"> <a href="{{ route('view-category', $cat->id) }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $cat->name}}</a>
                        @endforeach
                        {{-- @foreach ($categories as $cat)
                            <li class="menu-header"><a href="{{ route('view-category', $cat->id) }}">{{ $cat->name}}</a> </li>
                        @endforeach --}}
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
            <!-- /.search-area -->
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->

          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row">
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket">
                @php
                    $total = App\Models\Cart::all()->where('ip_address', request()->ip())->sum(
                        function($t){
                           return $t->price * $t->product_qty;
                        });
                        $quantity = App\Models\Cart::all()->where('ip_address', request()->ip())->sum('product_qty');
                @endphp
                <div class="basket-item-count">
                    <span class="count">{{ $quantity }}</span>
                </div>
                <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> <span class="value">${{ $total }}.00</span> </div>
                </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="cart-item product-summary">
                    @php
                        $carts = App\Models\Cart::with('product')->get();
                    @endphp
                    @foreach ($carts as $cart)
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="image"> <a href="#"><img src="{{ asset('storage/'.$cart->product->cover)}}" alt=""></a> </div>
                        </div>
                        <div class="col-xs-6">
                            <h3 class="name"><a href="#">{{ $cart->product->name}} ({{$cart->product_qty}})</a></h3>
                            <div class="price">${{ $cart->price * $cart->product_qty}}.00</div>
                        </div>
                        <div class="col-xs-2">
                            <form action="{{ route('carts.destroy',$cart->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="display: inline-block; border:none; font-size:16px;" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                  </div>
                  <!-- /.cart-item -->
                  <div class="clearfix"></div>
                  <hr>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>${{ $total }}.00</span> </div>
                    <div class="clearfix"></div>
                    <a href="{{ route('carts.index')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total-->

                </li>
              </ul>
              <!-- /.dropdown-menu-->
            </div>
            <!-- /.dropdown-cart -->

            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
              <div class="nav-outer">
                <ul class="nav navbar-nav">
                  <li class="active dropdown"> <a href="{{ route('home')}}">Home</a> </li>
                  @php
                      $categories = App\Models\Category::latest()->get();
                  @endphp
                  @foreach ($categories as $cat)
                  <li class="dropdown yamm mega-menu"> <a href="{{ route('view-category', $cat->id) }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $cat->name}}</a>
                  @endforeach

                </ul>
                <!-- /.navbar-nav -->
                <div class="clearfix"></div>
              </div>
              <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.nav-bg-class -->
        </div>
        <!-- /.navbar-default -->
      </div>
      <!-- /.container-class -->
    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->
  </header>
