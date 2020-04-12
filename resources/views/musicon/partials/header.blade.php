<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="col-10 offset-1">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <div>
                        <a href="{{url('/')}}" style="color: #23AF92; font-size: 20px; font-weight:bold ;">
                            <img src="{{ asset('musicon/img/core-img/musicon-logo.png') }}" alt="Musicon logo" style="width: 35px; height: 35px">
                            The Musicon
                        </a>
                    </div>

                    <!-- Search form -->
                    <form action="{{ url('/search') }}" method="get"
                        class="form-inline d-flex justify-content-center md-form form-sm active-green active-green-2 mt-2">
                        <input class="form-control form-control-sm ml-3" name="q" style="width: 350px"
                                type="text" placeholder="Search" aria-label="Search" required>
                        <button type="submit" class="ml-3"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>

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
                                <li><a href="#">Genres</a>
                                    <ul class="dropdown">
                                        @foreach(\App\Spotify::seeds['genres'] as $genre)
                                            <li><a href="{{url("/genres?q=$genre")}}">{{ $genre }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{url('/artists')}}">Artists</a></li>
                                <li><a href="{{url('/albums')}}">Albums</a></li>
                                <li><a href="{{url('/news')}}">News</a></li>
                                <li><a href="{{url('/events')}}">Events</a></li>
                                <li><a href="{{url('/contacts')}}">Contact</a></li>
                                @if(Auth::check() && Auth::user()->user_role == 0)
                                    <li><a href="{{url('/administrator')}}" style="color: #23AF92">musiconMyAdmin</a></li>
                                @endif
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                            @if(!Auth::check())
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">
                                    <span>
                                        <a href="{{url('/sign-in')}}" style="color: #23AF92">Sign in /</a>
                                    </span>
                                    <span>
                                        <a href="{{url('/sign-up')}}" style="color: #23AF92">Sign up</a>
                                    </span>
                                </div>
                            @else
                                <!-- User profile -->
                                <div class="login-register-btn mr-50">
                                    <span>
                                        <a href="{{url('/user/profile')}}" style="color: #23AF92">
                                            {{ Auth::user()->first_name }}'s profile /
                                        </a>
                                    </span>
                                    <span>
                                        <a href="{{url('/sign-out')}}" style="color: #23AF92">
                                            Sign out
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
