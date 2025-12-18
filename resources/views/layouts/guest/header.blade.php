<!-- ===================== TOPBAR START ===================== -->
<div class="container-fluid topbar d-none d-xl-block w-100">
    <div class="row gx-0 align-items-center" style="height: 45px;">

        <!-- LEFT: Developer Identity -->
        <div class="col-lg-6 d-flex align-items-center ps-4">
            <img src="{{ asset('assets-guest/img/rania.jpg') }}"
                 alt="Foto Developer"
                 class="rounded-circle me-3"
                 style="width: 45px; height: 45px; object-fit: cover;">

            <div class="text-start">
                <strong class="text-white">
                    Wan Rania Salma Faizaty — Sistem Informasi
                </strong><br>
                <small class="text-white-50">
                    NIM: 2457301151 | Prodi: D4 Sistem Informasi
                </small>
            </div>
        </div>

        <!-- RIGHT: Social Media -->
        <div class="col-lg-6 text-lg-end pe-4">
            <div class="d-flex align-items-center justify-content-end">

                <a href="https://www.linkedin.com/in/wan-rania-salma-faizaty-81103b395"
                   target="_blank"
                   class="btn btn-secondary btn-square border me-2">
                    <i class="fab fa-linkedin-in text-white"></i>
                </a>

                <a href="https://github.com/wanrania"
                   target="_blank"
                   class="btn btn-secondary btn-square border me-2">
                    <i class="fab fa-github text-white"></i>
                </a>

                <a href="https://instagram.com/wraniaaaa"
                   target="_blank"
                   class="btn btn-secondary btn-square border me-2">
                    <i class="fab fa-instagram text-white"></i>
                </a>

                <a href="mailto:rania.salma24@gmail.com"
                   class="btn btn-secondary btn-square border">
                    <i class="fas fa-envelope text-white"></i>
                </a>

            </div>
        </div>

    </div>
</div>
<!-- ===================== TOPBAR END ===================== -->


<!-- ===================== NAVBAR START ===================== -->
<div class="container-fluid sticky-top px-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light py-3 px-4">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="navbar-brand p-0">
            <img src="{{ asset('assets-guest/img/logo_horizontal.png') }}"
                 alt="Logo"
                 class="logo-navbar">
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <!-- NAV MENU -->
            <div class="navbar-nav ms-auto pt-2 pt-lg-0">

                <!-- PUBLIC -->
                <a href="{{ route('dashboard') }}"
                   class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('about') }}"
                   class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    About
                </a>

                <!-- LOGIN ONLY -->
                @auth
                    <a href="{{ route('proyek.index') }}"
                       class="nav-item nav-link {{ request()->routeIs('proyek.*') ? 'active' : '' }}">
                        Proyek
                    </a>

                    <a href="{{ route('tahapan.index') }}"
                       class="nav-item nav-link {{ request()->routeIs('tahapan.*') ? 'active' : '' }}">
                        Tahapan Proyek
                    </a>

                    <a href="{{ route('progres.index') }}"
                       class="nav-item nav-link {{ request()->routeIs('progres.*') ? 'active' : '' }}">
                        Progres Proyek
                    </a>

                    <a href="{{ route('lokasi.index') }}"
                       class="nav-item nav-link {{ request()->routeIs('lokasi.*') ? 'active' : '' }}">
                        Lokasi Proyek
                    </a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            Master Data
                        </a>
                        <div class="dropdown-menu m-lg-0">
                            <a href="{{ route('user.index') }}" class="dropdown-item">User</a>
                            <a href="{{ route('warga.index') }}" class="dropdown-item">Warga</a>
                            <a href="{{ route('kontraktor.index') }}" class="dropdown-item">Kontraktor</a>
                        </div>
                    </div>
                @endauth

            </div>

            <!-- RIGHT AUTH BUTTON -->
            <div class="d-flex align-items-center flex-nowrap pt-3 pt-lg-0 ms-lg-2">

                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                           data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-2 fs-5"></i>
                            {{ auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow">
                            <a href="{{ route('logout') }}"
                               class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="btn btn-secondary py-2 px-4 ms-3">
                        Login
                    </a>
                @endauth

            </div>

        </div>
    </nav>
</div>
<!-- ===================== NAVBAR END ===================== -->
