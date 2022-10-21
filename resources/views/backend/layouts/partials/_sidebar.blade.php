<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('backend/images/user/avatar-2.jpg')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>{{ Auth::user()->name }}</span>
                        <div id="more-details">UX Designer<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="#"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="#"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>{{ __('Pages')}}</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('categories.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Category</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('categories.index')}}">All Category</a></li>
                        <li><a href="{{ route('categories.create')}}">Create Category</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('subcategories.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Sub Category</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('subcategories.index')}}">All Sub-Category</a></li>
                        <li><a href="{{ route('subcategories.create')}}">Create Sub-Category</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('sliders.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Slider</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('sliders.index')}}">All Slider</a></li>
                        <li><a href="{{ route('sliders.create')}}">Create Slider</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('products.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Product</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('products.index')}}">All Product</a></li>
                        <li><a href="{{ route('products.create')}}">Create Product</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('coupons.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Coupon</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('coupons.index')}}">All Coupon</a></li>
                        <li><a href="{{ route('coupons.create')}}">Create Coupon</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('banners.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Banner</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('banners.index')}}">All Banner</a></li>
                        <li><a href="{{ route('banners.create')}}">Create Banner</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="{{ route('orders.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Order</span></a>
                </li>

                {{--<li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Post</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('posts.index')}}">All Post</a></li>
                        <li><a href="{{ route('posts.create')}}">Create Post</a></li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
