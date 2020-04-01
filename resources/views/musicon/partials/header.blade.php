<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <ul >
                        <li><a href="{{url('/')}}" style="color: #23AF92; font-size: 20px; font-weight:bold ;">The Musicon</a></li>
                    </ul>
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
                                        <li><a href="{{url('/events')}}">Events</a></li>
                                        <li><a href="{{url('/news')}}">News</a></li>
                                        <li><a href="{{url('/contacts')}}">Contact</a></li>
                                        <li><a href="{{url('/elements')}}">Elements</a></li>
                                        <li><a href="{{url('/login')}}" style="color: #23AF92">Login</a></li>
                                        <li><a href="{{url('/register')}}" style="color: #23AF92">Register</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">
                                    <a href="{{url('/login')}}" id="loginBtn" style="color: #23AF92">Login /</a>
                                    <a href="{{url('/register')}}" id="loginBtn" style="color: #23AF92">Register</a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
