<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <div>
                        <img src="{{ asset('musicon/img/core-img/musicon-logo.png') }}" alt="Musicon logo"
                             style="width: 35px; height: 35px">
                        <a href="{{url('/')}}" style="color: #23AF92; font-size: 20px; font-weight:bold ;">The Musicon</a>
                    </div>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('/albums')}}">Albums</a></li>
                                <li><a href="{{url('/events')}}">Events</a></li>
                                <li><a href="{{url('/news')}}">News</a></li>
                                <li><a href="{{url('/contacts')}}">Contact</a></li>
                                <li><a href="{{url('/pages')}}">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{url('/albums')}}">Albums</a></li>
                                        <li><a href="{{url('/artist')}}">Artist</a></li>
                                        <li><a href="{{url('/events')}}">Events</a></li>
                                        <li><a href="{{url('/news')}}">News</a></li>
                                        <li><a href="{{url('/contacts')}}">Contact</a></li>
                                        <li><a href="{{url('/elements')}}">Elements</a></li>
                                        <li><a href="{{url('/information')}}" style="color: #23AF92">Information</a></li>
                                        @if(!Auth::check())
                                            <li><a href="{{url('/sign-in')}}" style="color: #23AF92">Sign in</a></li>
                                            <li><a href="{{url('/sign-up')}}" style="color: #23AF92">Sign up</a></li>
                                        @endif
                                    </ul>
                                </li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                            @if(!Auth::check())
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">
                                    <span>
                                        <a href="{{url('/sign-in')}}" id="loginBtn" style="color: #23AF92">Sign in /</a>
                                    </span>
                                    <span>
                                        <a href="{{url('/sign-up')}}" id="loginBtn" style="color: #23AF92">Sign up</a>
                                    </span>
                                </div>
                            @else
                                <!-- User profile -->
                                <div class="login-register-btn mr-50">
                                    <span>
                                        <a href="{{url('/user/profile')}}" id="loginBtn" style="color: #23AF92">
                                            {{ Auth::user()->first_name }}'s profile
                                        </a>
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
