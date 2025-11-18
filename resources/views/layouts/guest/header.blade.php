<header id="header" class="header d-flex align-items-center sticky-top bg-white shadow-sm">
    <div class="container-fluid container-xl d-flex justify-content-between align-items-center py-3">

        {{-- Logo dan Judul --}}
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets-guest/img/logo.png') }}" alt="" class="me-2" style="height: 36px;">
            <h1 class="sitename m-0 fw-bold text-primary">Monitoring Proyek</h1>
        </a>

        {{-- Navbar Menu --}}
        <nav id="navbar" class="navbar d-none d-md-block">
            <ul class="d-flex align-items-center list-unstyled m-0 gap-4">

                {{-- Link menu utama --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'fw-bold text-primary' : 'text-dark' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'fw-bold text-primary' : 'text-dark' }}">
                        About
                    </a>
                </li>

                <li>
                    <a href="{{ route('proyek.index') }}"
                        class="nav-link {{ request()->routeIs('proyek.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        Proyek
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->routeIs('user.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        User
                    </a>
                </li>

                <li>
                    <a href="{{ route('warga.index') }}"
                        class="nav-link {{ request()->routeIs('warga.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        Warga
                    </a>
                </li>

                <li>
                    <a href="{{ route('lokasi.index') }}"
                        class="nav-link {{ request()->routeIs('lokasi.*') ? 'fw-bold text-primary' : 'text-dark' }}">
                        Lokasi Proyek
                    </a>
                </li>



                {{-- Dropdown User --}}
                @if (session('user'))
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark fw-semibold"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> {{ session('user')->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class="btn btn-outline-primary btn-sm rounded-pill px-3 py-1 {{ request()->routeIs('login') ? 'active' : '' }}">
                            Login
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

        {{-- Mobile Navbar Toggle --}}
        <i class="bi bi-list mobile-nav-toggle d-md-none fs-2 text-dark"></i>
    </div>
</header>
