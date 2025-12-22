<!-- ===================== TOPBAR START ===================== -->
<div class="container-fluid topbar d-none d-xl-block w-100">
    <div class="row gx-0 align-items-center" style="height:45px;">

        <!-- LEFT INFO -->
        <div class="col-lg-6 text-center text-lg-start mb-lg-0">
            <div class="d-flex flex-wrap ps-4">
                <span class="text-muted me-4">
                    <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                    Indonesia
                </span>
                <a href="tel:+6281234567890" class="text-muted me-4">
                    <i class="fas fa-phone-alt text-secondary me-2"></i>
                    +62 812-3456-7890
                </a>
                <a href="mailto:projekta@gmail.com" class="text-muted">
                    <i class="fas fa-envelope text-secondary me-2"></i>
                    projekta@gmail.com
                </a>
            </div>
        </div>

        <!-- RIGHT INFO + SOSMED -->
        <div class="col-lg-6 text-center text-lg-end">
            <div class="d-flex align-items-center justify-content-end pe-4">
                <span class="text-muted me-3">
                    <i class="fas fa-clock text-secondary me-2"></i>
                    Senin – Sabtu | 08.00 – 17.30
                </span>

                <!-- FACEBOOK -->
                <a href="https://www.facebook.com/" target="_blank"
                   class="btn btn-primary btn-square border border-white me-2"
                   aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <!-- INSTAGRAM -->
                <a href="https://www.instagram.com/" target="_blank"
                   class="btn btn-primary btn-square border border-white me-2"
                   aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>

                <!-- LINKEDIN -->
                <a href="https://www.linkedin.com/" target="_blank"
                   class="btn btn-primary btn-square border border-white"
                   aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
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
            <img src="{{ asset('assets-guest/img/logo_horizontal.png') }}" alt="Logo" class="logo-navbar">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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
                    {{-- <div class="nav-item dropdown">
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
                    </div> --}}
                    <div class="nav-item dropdown d-flex align-items-center">

                        <!-- LINK KE INDEX PROYEK -->
                        <a href="{{ route('proyek.index') }}" class="nav-link pe-1">
                            Proyek
                        </a>

                        <!-- ICON DROPDOWN -->
                        <a href="#" class="nav-link dropdown-toggle ps-1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        </a>

                        <div class="dropdown-menu m-lg-0">
                            <a href="{{ route('tahapan.index') }}" class="dropdown-item">Tahapan Proyek</a>
                            <a href="{{ route('progres.index') }}" class="dropdown-item">Progres Proyek</a>
                            <a href="{{ route('lokasi.index') }}" class="dropdown-item">Lokasi Proyek</a>
                            <a href="{{ route('kontraktor.index') }}" class="dropdown-item">Kontraktor</a>
                        </div>
                    </div>


                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            Master Data
                        </a>
                        <div class="dropdown-menu m-lg-0">
                            <a href="{{ route('user.index') }}" class="dropdown-item">User</a>
                            <a href="{{ route('warga.index') }}" class="dropdown-item">Warga</a>
                        </div>
                    </div>
                @endauth

            </div>

            <!-- RIGHT AUTH / MENU -->
            <div class="d-flex align-items-center ms-lg-3">

                @auth
                    <!-- USER DROPDOWN -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle fs-4 me-2 text-primary"></i>
                            {{ auth()->user()->name }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-end shadow">
                            <a href="{{ route('developer') }}" class="dropdown-item">
                                <i class="bi bi-person-badge me-2"></i> Developer
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </div>
                    </div>
                @else
                    <!-- HAMBURGER MENU -->
                    <div class="nav-item dropdown">
    <a href="#" class="btn btn-outline-secondary rounded-circle p-2"
       data-bs-toggle="dropdown">
        <i class="bi bi-person fs-4"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-end shadow">
        <a href="{{ route('login') }}" class="dropdown-item">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login
        </a>
        <a href="{{ route('developer') }}" class="dropdown-item">
            <i class="bi bi-person-badge me-2"></i> Developer
        </a>
    </div>
</div>

                @endauth

            </div>



        </div>
    </nav>
</div>
<!-- ===================== NAVBAR END ===================== -->
