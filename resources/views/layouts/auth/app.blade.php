<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Login')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    {{-- Favicon --}}
    <link href="{{ asset('assets-guest/img/favicon.ico') }}" rel="icon">

    {{-- Google Web Fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Icon Fonts --}}
    <link href="{{ asset('assets-guest/lib/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    {{-- Libraries Stylesheet --}}
    <link href="{{ asset('assets-guest/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="{{ asset('assets-guest/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Main Style --}}
    <link href="{{ asset('assets-guest/css/style.css') }}" rel="stylesheet">
</head>

<body>

    {{-- Content --}}
    @yield('content')

    {{-- JavaScript Libraries --}}
    <script src="{{ asset('assets-guest/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets-guest/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    {{-- Main JS --}}
    <script src="{{ asset('assets-guest/js/main.js') }}"></script>
</body>

</html>
