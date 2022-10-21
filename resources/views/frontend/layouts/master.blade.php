<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield("title")</title>

@include('frontend.layouts.partials._styles')
@yield('style')
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.layouts.partials._header')
<!-- ============================================== HEADER : END ============================================== -->
@yield('content')

        <!-- ============================================== INFO BOXES ============================================== -->

        <!-- /.info-boxes -->
        <!-- ============================================== INFO BOXES : END ============================================== -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.layouts.partials._footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->
@include('frontend.layouts.partials._scripts')
@yield('script')
</body>

</html>
