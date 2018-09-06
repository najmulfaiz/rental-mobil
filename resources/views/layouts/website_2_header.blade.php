<!-- Header
============================================= -->
<header id="header" class="full-header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ url('/') }}" class="standard-logo" data-dark-logo="{{ asset('website/images/logo-dark.png') }}"><img src="{{ asset('website/images/logo.png') }}" alt="Canvas Logo"></a>
                <a href="{{ url('/') }}" class="retina-logo" data-dark-logo="{{ asset('website/images/logo-dark@2x.png') }}"><img src="{{ asset('website/images/logo@2x.png') }}" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">

                <ul>
                    <li><a href="{{ url('/') }}"><div>Home</div></a></li>
                    <li><a href="#"><div>Cari Mobil</div></a></li>
                    <li><a href="#"><div>Tentang Kami</div></a></li>
                    <li><a href="#"><div>Kontak</div></a></li>
                    @if(Route::has('login'))
                        @auth                            
                            <li><a href="{{ url('/') }}"><div><i class="icon-user"></i> {{ Auth::user()->name }}</div></a>
                                <ul>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <div><i class="icon-line2-logout"></i> Logout</div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    @endif
                </ul>

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->