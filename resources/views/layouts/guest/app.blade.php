<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pembangunan & Monitoring Proyek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- start css --}}
    @include('layouts.guest.css')
    {{-- end css --}}
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    {{-- start header --}}
    @include('layouts.guest.header')
    {{-- end header --}}

    <!-- Content Start -->
    @yield('content')
    {{-- end content --}}

    <!-- Footer Start -->
    @include('layouts.guest.footer')
    <!-- Footer End -->

<!-- Floating WhatsApp -->
<a href="https://wa.me/6282286667590?text=Halo,%20saya%20ingin%20bertanya%20tentang%20proyek..."
   class="floating-wa-text"
   target="_blank">
    <i class="fab fa-whatsapp me-2"></i> Chat Admin
</a>


    {{-- start js --}}
    @include('layouts.guest.js')
    {{-- end js --}}
</body>

</html>
