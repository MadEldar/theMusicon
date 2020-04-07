<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <ul >
                    <li><a href="{{url('/')}}"   style="color: #23AF92; font-size: 20px; font-weight:bold ;">The Musicon</a></li>
                </ul>
                <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        @csrf
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></a></p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/albums')}}">Albums</a></li>
                        <li><a href="{{url('/events')}}">Events</a></li>
                        <li><a href="{{url('/news')}}">News</a></li>
                        <li><a href="{{url('/contacts')}}">Contact</a></li>
                        <li><a href="{{url('/elements')}}">Elements</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
