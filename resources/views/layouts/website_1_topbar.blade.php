<!-- Top Bar
============================================= -->
<div id="top-bar" class="transparent-topbar">

    <div class="container clearfix">

        <div class="col_half nobottommargin clearfix">

            <!-- Top Links
            ============================================= -->
            <div class="top-links">
                <ul>
                    <li><a href="#">Semua Kota</a>
                        <ul>
                            <li><a href="#">Jakarta</a></li>
                            <li><a href="#">Bandung</a></li>
                            <li><a href="#">Semarang</a></li>
                            <li><a href="#">Jogjakarta</a></li>
                            <li><a href="#">Surabaya</a></li>
                            <li><a href="#">Malang</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- .top-links end -->

        </div>

        <div class="col_half fright col_last clearfix nobottommargin">

            <!-- Top Links
            ============================================= -->
            <div class="top-links">
                <ul>
                    <li class="d-md-none d-lg-block"><a href="#"><i class="icon-call"></i> +1800-123-7890</a></li>
                    <li><a href="#"><i class="icon-download-alt"></i> Download App</a></li>
                    {{-- <li class="top-bar-highlight"><a href="#">Sell/Rent your Property</a>
                        <div class="top-link-section" style="font-size: 14px;">
                            Genuine Clients, 100% Trust Assurance and Lowest Fees on the Market. <a href="#" class="more-link font-secondary" style="border-bottom-style: dotted;">Learn More &rarr;</a>
                        </div>
                    </li> --}}
                    @if(Route::has('login'))
                        @auth
                            @if(Auth::user()->level == 'admin')
                                <li><a href="{{ route('admin.home') }}">{{ Auth::user()->name }}</a></li>
                            @else
                                <li><a href="{{ route('user.show', Auth::user()->id) }}">{{ Auth::user()->name }}</a></li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div><i class="icon-line2-logout"></i> Logout</div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                </ul>
            </div><!-- .top-links end -->

        </div>

    </div>

</div><!-- #top-bar end -->