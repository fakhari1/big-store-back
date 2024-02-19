<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    @include('Front::asset.styles')
    @yield('styles')
    <title>فروشگاه آمازون</title>
</head>
<body>


<!-- start header -->
@include('Front::layouts.header')
<!-- end header -->

@yield('content')

<!-- start footer -->
@include('Front::layouts.footer')
<!-- end footer -->



@include('Front::asset.scripts')
@yield('scripts')
</body>
</html>
