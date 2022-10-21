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
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
          <!-- ================================== TOP NAVIGATION ================================== -->
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
            <nav class="yamm megamenu-horizontal">
              <ul class="nav">
                @foreach ($categories as $cat)
                <li class="dropdown menu-item"> <a href="{{ route('view-category', $cat->id )}}"  ><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $cat->name }}</a></li>
            @endforeach
              </ul>
              <!-- /.nav -->
            </nav>
            <!-- /.megamenu-horizontal -->
          </div>
          <!-- /.side-menu -->
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter">
              <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
              <div class="sidebar-widget">
                <h3 class="section-title">Shop by</h3>
                <div class="widget-header">
                  <h4 class="widget-title">Category</h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">
                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed"> Camera </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                          </ul>
                        </div>
                        <!-- /.accordion-inner -->
                      </div>
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->

                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed"> Desktops </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                          </ul>
                        </div>
                        <!-- /.accordion-inner -->
                      </div>
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->

                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed"> Pants </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                          </ul>
                        </div>
                        <!-- /.accordion-inner -->
                      </div>
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->

                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed"> Bags </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                          </ul>
                        </div>
                        <!-- /.accordion-inner -->
                      </div>
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->

                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed"> Hats </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                          </ul>
                        </div>
                        <!-- /.accordion-inner -->
                      </div>
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->

                    <div class="accordion-group">
                      <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed"> Accessories </a> </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            <li><a href="#">gaming</a></li>
                            <li><a href="#">office</a></li>
                            <li><a href="#">kids</a></li>
                            <li><a href="#">for women</a></li>
                          </ul>
                        </div>
                        <!-- /.accordion-inner -->
                      </div>
                      <!-- /.accordion-body -->
                    </div>
                    <!-- /.accordion-group -->

                  </div>
                  <!-- /.accordion -->
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

              <!-- ============================================== PRICE SILDER============================================== -->
              <div class="sidebar-widget">
                <div class="widget-header">
                  <h4 class="widget-title">Price Slider</h4>
                </div>
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                    <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                    <input type="text" class="price-slider" value="" >
                  </div>
                  <!-- /.price-range-holder -->
                  <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== PRICE SILDER : END ============================================== -->
              <!-- ============================================== MANUFACTURES============================================== -->
              <div class="sidebar-widget">
                <div class="widget-header">
                  <h4 class="widget-title">Manufactures</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    <li><a href="#">Forever 18</a></li>
                    <li><a href="#">Nike</a></li>
                    <li><a href="#">Dolce & Gabbana</a></li>
                    <li><a href="#">Alluare</a></li>
                    <li><a href="#">Chanel</a></li>
                    <li><a href="#">Other Brand</a></li>
                  </ul>
                  <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                </div>
                <!-- /.sidebar-widget-body -->
              </div>
              <!-- /.sidebar-widget -->
              <!-- ============================================== MANUFACTURES: END ============================================== -->
              <!-- ============================================== COLOR============================================== -->
              <!-- /.sidebar-widget -->
              <!-- ============================================== COLOR: END ============================================== -->

            </div>
            <!-- /.sidebar-filter -->
          </div>
          <!-- /.sidebar-module-container -->
        </div>
        <!-- /.sidebar -->
        <div class="col-xs-12 col-sm-12 col-md-9 rht-col">
          <!-- ========================================== SECTION – HERO ========================================= -->

          <div id="category" class="category-carousel hidden-xs">
            <div class="item">
              <div class="image"> <img src="{{ asset('frontend/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive"> </div>
              <div class="container-fluid">
                <div class="caption vertical-top text-left">
                  <div class="big-text"> Big Sale </div>
                  <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                  <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                  <div class="buy-btn"><a href="#" class="lnk btn btn-primary">Show Now</a></div>
                </div>
                <!-- /.caption -->
              </div>
              <!-- /.container-fluid -->
            </div>
          </div>


          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
                <div class="col col-sm-6 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-6 col-md-6 no-padding hidden-sm hidden-md">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld -->
                  </div>
                  <!-- /.lbl-cnt -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 col-xs-6 col-lg-4 text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
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
                            <h3 class="name"><a href="{{ route('view-product',$product->id)}}">{{ $product->name }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <div class="product-price"> <span class="price">$ {{ $product->seller_price }} </span> <span class="price-before-discount">${{ $product->regular_price }}</span> </div>
                            <!-- /.product-price -->

                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                    </div>
                    <!-- /.item -->
                    @endforeach
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.category-product -->

              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane #list-container -->
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container bottom-row">
              <div class="text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
                    <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                  </ul>
                  <!-- /.list-inline -->
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right -->

            </div>
            <!-- /.filters-container -->

          </div>
          <!-- /.search-result-container -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.logo-slider -->
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container -->
  </div>
@endsection
