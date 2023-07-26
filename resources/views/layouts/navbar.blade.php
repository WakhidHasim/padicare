<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><img src="{{ asset('admin/img/logo.png') }}" alt="navbar brand" class="navbar-brand"
                width="125px"></h1>
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li>
                    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li>
                    <a class="{{ request()->is('diagnosis') ? 'active' : '' }}"
                        href="{{ route('diagnosis.index') }}">Diagnosa</a>
                </li>
                <li>
                    <a class="{{ request()->is('teams') ? 'active' : '' }}" href="{{ route('team') }}">Anggota
                        Kelompok</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>
<!-- End Header -->