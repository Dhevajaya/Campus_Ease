<header class="theme-header transparent-header">
    <div class="header-navigation navigation-white">
        <div class="nav-overlay"></div>
        <div class="container">
            <div class="primary-menu">
                <div class="site-branding ">
                    <a href="{{ route('landing-page.home.index') }}" class="brand-logo"><img
                            src="{{ asset('storage/' . web_settings('web', 'website_logo')) }}" alt="Site Logo"
                            style="width: 170px;height:auto;"></a>
                </div>
                <div class="nav-menu nav-ml-auto">
                    <!-- Navbar logo -->
                    <div class="sidebar-logo">
                        <a href="{{ route('landing-page.home.index') }}" class="brand-logo"><img
                                src="{{ asset('storage/' . web_settings('web', 'website_logo_dark')) }}"
                                alt="Site Logo"></a>
                    </div>
                    <!-- Navbar Close -->
                    <div class="navbar-close"><i class="far fa-times"></i></div>
                    <!-- Nav Menu -->
                    <nav class="main-menu">
                        <ul>
                            <li class="menu-item"><a href="{{ route('landing-page.home.index') }}">Home</a></li>
                            <li class="menu-item"><a href="{{ route('landing-page.daftaruniversitas.index') }}">DaftarUniversitas</a></li>
                            <li class="menu-item"><a href="{{ route('landing-page.announcements.index') }}">Beasiswa</a></li>
                            <li class="menu-item"><a href="{{ route('landing-page.file-public.index') }}">Pembelajaran</a></li>
                            <li class="menu-item"><a href="https://simulasi-tes.bppp.kemdikbud.go.id">Test Simulasi</a>
                            <li class="menu-item"><a href="{{ route('landing-page.discussions.index') }}">Diskusi</a></li>
                            {{-- <li class="menu-item"><a href="{{route('landing-page.achievements.index')}}">Cari Universitas</a></li> --}}
                            <li class="menu-item has-children "><a href="#">Lainnya</a>
                                <ul class="sub-menu">
                                   
                                    <li><a href="{{ route('landing-page.employees.index') }}">Tim Pengembang</a></li>
                                    <li><a href="{{ route('landing-page.faq.index') }}">Faq</a></li>
                                    <li><a href="{{ route('landing-page.contact.index') }}">Hubungi Kami</a></li>
                                    {{-- <li><a href="{{route('landing-page.announcements.index')}}">Beasiswa</a></li> --}}

                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                {{-- <div class="header-right-nav">
                    <ul class="d-inline-flex align-items-center">
                        @if (!Auth::check())
                        <li class="nav-button"><a href="{{route('dashboard.auth.login.index')}}" class="main-btn bordered-btn">Login</a></li>
                        @else
                        <li class="nav-button"><a href="{{route('dashboard.dashboard.index')}}" class="main-btn bordered-btn">Dashboard</a></li>
                        @endif
                        <li class="nav-toggle-btn">
                            <div class="navbar-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</header>
