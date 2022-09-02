<!-- Header
  ============================================= -->
<header id="header" class="transparent-header header-size-custom" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">
                <!-- Logo
============================================= -->
                <div id="logo">
                    <a href="{{ route('landing.index') }}" class="standard-logo"><img
                            src="{{ asset('images/navbar-logo-transparent.png') }}" alt="DPRD LOGO"></a>
                    <a href="{{ route('landing.index') }}" class="retina-logo"><img
                            src="{{ asset('images/navbar-logo-transparent.png') }}" alt="DPRD LOGO"></a>
                </div>
                <!-- #logo end -->

                <div class="header-misc">
                    <a href="{{ route('kuesioner') }}"
                        class="button button-small fw-semibold button-border button-rounded ls0 fw-medium nott">Nilai
                        Kami Disini</a>
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>

                <!-- Primary Navigation
============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">
                        <li class="{{ request()->segment(1) == '' ? 'current' : '' }} menu-item">
                            <a class="menu-link" href="{{ route('landing.index') }}">
                                <div>BERANDA</div>
                            </a>
                        </li>
                        {{-- <li class="menu-item {{ request()->segment(1) == 'ikm' ? 'current' : '' }}">
                            <a class="menu-link" href="{{ route('ikm.index') }}">
                                <div>SKRIPSI</div>
                            </a>
                        </li> --}}
                    </ul>

                </nav><!-- #primary-menu end -->
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->

<!-- Slider
============================================= -->
