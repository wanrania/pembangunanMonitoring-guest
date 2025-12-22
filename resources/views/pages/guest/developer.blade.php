@extends('layouts.guest.app')

@section('content')
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-5">

            <div class="card developer-card text-center p-4">

                <!-- BADGE -->
                <span class="developer-badge">
                    <i class="bi bi-code-slash me-1"></i> Developer
                </span>

                <!-- AVATAR -->
                <img src="{{ asset('assets-guest/img/rania.jpg') }}"
                     class="rounded-circle developer-avatar mx-auto">

                <!-- NAME -->
                <h4 class="fw-bold mt-3 mb-1">
                    Wan Rania Salma Faizaty
                </h4>

                <!-- INFO -->
                <p class="text-muted mb-2">
                    NIM 2457301151<br>
                    D4 Sistem Informasi
                </p>

                <hr>

                <!-- DESCRIPTION -->
                <p class="developer-desc">
                    Mahasiswa Sistem Informasi yang tertarik pada pengembangan
                    aplikasi web, UI/UX, dan sistem informasi berbasis kebutuhan pengguna.
                </p>

                <!-- SOCIAL -->
                <div class="d-flex justify-content-center gap-3 fs-4 mt-3 developer-social">
                    <a href="https://www.linkedin.com/in/wan-rania-salma-faizaty-81103b395" target="_blank">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/wanrania" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://instagram.com/wraniaaaa" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="mailto:rania.salma24@gmail.com">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
