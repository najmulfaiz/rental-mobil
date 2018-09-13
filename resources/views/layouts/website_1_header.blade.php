<!-- Header
============================================= -->
<header id="header" class="static-sticky transparent-header dark">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ url('/') }}" data-dark-logo="{{ asset('website/demos/real-estate/images/logo.png') }}" class="standard-logo"><img src="{{ asset('website/demos/real-estate/images/logo.png') }}" alt="Canvas Logo"></a>
                <a href="{{ url('/') }}" data-dark-logo="{{ asset('website/demos/real-estate/images/logo@2x.png') }}" class="retina-logo"><img src="{{ asset('website/demos/real-estate/images/logo@2x.png') }}" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="with-arrows">

                <ul>
                    <li class="current"><a href="{{ url('/') }}"><div>Beranda</div></a></li>
                    {{-- <li><a href="demos/real-estate/#"><div>Properties</div></a>
                        <ul>
                            <li><a href="demos/real-estate/single-property.html"><div>Condo Apartments</div></a></li>
                            <li><a href="demos/real-estate/single-property.html"><div>Luxury Villas</div></a></li>
                            <li><a href="demos/real-estate/single-property.html"><div>Premium Estates</div></a></li>
                        </ul>
                    </li> --}}
                    <li><a href="{{ route('website.list_produk') }}"><div>Cari Mobil</div></a></li>
                    <li><a href="{{ route('website.tentang') }}"><div>Tentang Kami</div></a></li>
                    <li><a href="{{ route('website.kontak') }}"><div>Kontak</div></a></li>
                </ul>

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header><!-- #header end -->