<!DOCTYPE html>
<html lang="en">
@include('musicon/partials/head')
<body>
<!-- Preloader -->
@include('musicon/partials/preloader')

<!-- ##### Header Area Start ##### -->
@include('musicon/partials/preloader')
<!-- ##### Header Area End ##### -->
@include('musicon/partials/header')

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url('musicon/img/bg-img/breadcumb3.jpg');">
    <div class="bradcumbContent">
        <p>See what’s new</p>
        <h2>Player Music</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Song Area Start ##### -->
<div class="one-music-songs-area mb-70 section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="col-8 m-0">
                    <iframe src="https://open.spotify.com/embed/album/1DFixLWuPkv3KT3TnV35m3" width="100%" height="151px" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="col-4">
                    <ul>
                        <li>
                            <div>
                                <a href=""></a>
                                <h1>HIHI</h1>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="{{asset('musicon/img/bg-img/s1.jpg')}}" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="{{asset('musicon/img/bg-img/s2.jpg')}}" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="{{asset('musicon/img/bg-img/s3.jpg')}}" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>
                </div>
            </div>

            <!-- Single Song Area -->
            <div class="col-12">
                <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                    <div class="song-thumbnail">
                        <img src="{{asset('musicon/img/bg-img/s4.jpg')}}" alt="">
                    </div>
                    <div class="song-play-area">
                        <div class="song-name">
                            <p>01. Main Hit Song</p>
                        </div>
                        <audio preload="auto" controls>
                            <source src="{{asset('audio/dummy-audio.mp3')}}">
                        </audio>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ##### Song Area End ##### -->

<!-- ##### Contact Area Start ##### -->
@include('musicon/partials/contact')
<!-- ##### Contact Area End ##### -->

<!-- ##### Footer Area Start ##### -->
@include('musicon/partials/footer')
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
@include('musicon/partials/scripts')
</body>

</html>
