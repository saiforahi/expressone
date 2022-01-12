<header class="header-main header-style3">

    <!-- Header Topbar -->
 {{--    <div class="top-bar2">
        <div class="theme-container container">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <a class="navbar-logo" href="#"> <img src="./images/{{ basic_information()->company_logo }}"
                            alt="logo" /> </a>
                </div>
                <div class="col-md-10 col-sm-12 fs-12 text-right">
                    <ul>
                        <li><p style="color: black;font-size: 18px;font-weight: 600;margin-bottom: 0" class="font-oswld"> {{basic_information()->meet_time}} </p></li>
                        <li><p style="color: #6c6565;font-size: 12px;margin-bottom: 0"> {{basic_information()->address}} </p></li>
                        <li>
                            <p style="color: black;font-size: 16px;margin-bottom: 0" class="font-oswld">
                                {{basic_information()->phone_number_one}} </p>
                        </li>


                    </ul>
                </div>
            </div>
        </div>

    </div> --}}
    <!-- /.Header Topbar -->

    <!-- Header Logo & Navigation -->
    <nav class="menu-bar font2-title1">
        <div class="theme-container container">
            <div class="row">
                <div class="col-xs-12 visible-xs">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="visible-xs">
                        <a data-toggle="modal" href="#login-popup" class="sign-in fs-12 black-bg"> sign in </a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12 fs-12">
                    {{-- <a class="sticky-logo hidden-sm" href="/">
                        <img alt="" width="80" src="/images/{{ basic_information()->company_logo }}" /> </a> --}}

                    <div id="navbar" class="collapse navbar-collapse no-pad">
                        <ul class="navbar-nav theme-menu">
                            <li>
                                <a class="navbar-logo" href="/"> <img width="50" height="20" src="./images/{{ basic_information()->company_logo }}"
                                    alt="logo" /> </a>
                            </li>
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}"><i
                                        class="fa fa-home fa-2x" aria-hidden="true"></i> </a>
                            </li>
                            <li class="dropdown-toggle {{ request()->is('about') ? 'active' : '' }}"><a href="#">about
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('about') }}">About Company</a></li>
                                    <li><a href="{{ route('mission') }}">Mission</a></li>
                                    <li><a href="{{ route('vision') }}">Vision</a></li>
                                    <li><a href="{{ route('promise') }}">Our Promise</a></li>
                                    <li><a href="{{ route('history') }}">Company history</a></li>
                                    <li><a href="{{ route('team') }}">Our Management Team</a></li>
                                </ul>
                            </li>
                            {{-- <li class="{{ (request()->is('tracking')) ? 'active' : '' }}"><a
                                    href="{{route('tracking')}}"> tracking </a></li> --}}
                            <li class="dropdown-toggle"> <a href="">Products & Services <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="">E-Commerce Delivery & Logistics</a></li>
                                    <li><a href="">Corporate Service</a></li>
                                    <li><a href="">Parcel Service</a></li>
                                </ul>
                            </li>
                            <li class="{{ request()->is('pricing') ? 'active' : '' }}"><a href="">
                                    Service Delivery Network </a></li>
                            <li class=""><a href="">
                                    Career</a></li>
                            <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="{{ route('blog') }}">
                                    News Room </a></li>
                            <li><a href=""><i class="fa fa-phone"></i></a> 01773371401</li>
                            {{-- <li class="{{ (request()->is('pricing')) ? 'active' : '' }}"><a href="{{route('pricing')}}">
                                    Pricing </a></li>

                            <li class="{{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{route('contact')}}">
                                    contact </a></li> --}}

                        </ul>
                    </div>
                </div>
                @if (!Auth::check())
                    <div class="col-md-1 col-sm-1 text-right hidden-xs white-clr">
                        <a href="{{ route('login') }}" class="sign-in fs-12"
                            style="background-color: #EB058D;border-radius: 10px"> sign in </a>
                    </div>
                    <div class="col-md-1 col-sm-1 text-right hidden-xs white-clr">
                        <a href="{{ route('register') }}" class="sign-in fs-12 black-bg"
                            style="background-color: #EB058D;border-radius: 10px"> register </a>
                    </div>
                @else
                    <div class="col-md-3 col-sm-3 text-right hidden-xs white-clr">
                        <a href="{{ route('merchantShipments') }}" class="sign-in fs-12 black-bg"
                            style="background-color: #504f50;border-radius: 10px"> Merchant Dashboard </a>
                    </div>
                @endif

            </div>
        </div>
    </nav>
    <!-- /.Header Logo & Navigation -->

</header>
