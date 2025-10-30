<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Monitoring Proyek')</title>

    {{-- ================= CSS ================= --}}
    @include('layouts.guest.css')
</head>

<body>
    {{-- ================= Header ================= --}}
    @include('layouts.guest.header')

    {{-- ================= Main Content ================= --}}
    <main class="py-4">
        @yield('content')
    </main>

    {{-- ================= Footer ================= --}}
    @include('layouts.guest.footer')

    {{-- ================= JS ================= --}}
    @include('layouts.guest.js')
</body>

</html>
