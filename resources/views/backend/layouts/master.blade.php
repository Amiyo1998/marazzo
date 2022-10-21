<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    @include('backend.layouts.partials._styles')
    @yield('styles')

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
    @include('backend.layouts.partials._sidebar')
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
    @include('backend.layouts.partials._header')
	<!-- [ Header ] end -->



<!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        @yield('content')
    </div>
    <!-- Required Js -->
    @include('backend.layouts.partials._scripts')
    @yield('scripts')
</body>
</html>

