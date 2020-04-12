<!DOCTYPE html>
<html lang="en">
@include('musicon/partials/head')
@php
    use App\Spotify;
@endphp
<body>
    <!-- Message -->
    @include('musicon/partials/message')

    <!-- Preloader -->
    @include('musicon/partials/preloader')

    <!-- ##### Header Area Start ##### -->
    @include('musicon/partials/header')

    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{ asset('/musicon/img/bg-img/bg-1.jpg') }});"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Beyond Time <span>Beyond Time</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url('musicon/img/bg-img/bg-2.jpg');  "></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Colorlib Music <span>Colorlib Music</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Latest Albums</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p>View the latest trending albums on Spotify.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($albums as $album)
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ $album->images[1]->url }}" alt="">
                            <div class="album-info">
                                <a href="{{ url("/album?q=$album->id") }}">
                                    <h5>{{ $album->name }}</h5>
                                </a>
                                <a href="{{ url('/artist/'.$album->artists[0]->id) }}">
                                    <p>{{ $album->artists[0]->name }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Top Tracks Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Recommended tracks</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($tracks as $track)
                    <!-- Single Album Area -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                            <div class="album-thumb">
                                <img src="{{ $track->album->images[1]->url }}" alt="">
                                @if(!isset($track->preview_url))
                                    <div class="album-price">
                                        <p>No preview</p>
                                    </div>
                                @else
                                    <!-- Play Icon -->
                                    <div class="play-icon">
                                        <a href="{{ $track->preview_url }}" class="video--play--btn">
                                            <span class="icon-play-button"></span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="album-info">
                                <a href="{{ url('/player?track='. urlencode($track->name.' '.$track->artists[0]->name)) }}">
                                    <h5>{{ $track->name }}</h5>
                                </a>
                                <a href="{{ url('/artist/'.$track->artists[0]->id) }}">
                                    <p>{{ $track->artists[0]->name }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Top Tracks Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image:url('musicon/img/bg-img/bg-4.jpg');">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img src="{{ $new_track->album->images[0]->url }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>Try a random new song</h2>
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <a href="{{ url('/player?track='.urlencode($new_track->name.' '.$new_track->artists[0]->name)) }}"
                                    class="text-white-50">
                                    {{ $new_track->name }} - {{ $new_track->artists[0]->name }}
                                </a>
                            </div>
                            <iframe src="{{ $new_track->preview_url }}" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>New Releases</h2>
                        </div>
                        @foreach($new_releases as $album)
                            <!-- Single Top Item -->
                            <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                                <div class="thumbnail">
                                    <img style="width:75px" src="{{ $album->images[2]->url }}" alt="">
                                </div>
                                <div class="content-">
                                    <h6><a href="{{ url("/album?q=$album->id") }}">{{ $album->name }}</a></h6>
                                    <a href="{{ url('/artist/'.$album->artists[0]->id) }}">
                                        <p>{{ $album->artists[0]->name }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>New Hits</h2>
                        </div>
                        @foreach($top_tracks as $track)
                            <!-- Single Top Item -->
                            <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail">
                                        <img style="width:75px" src="{{ $track->album->images[2]->url }}" alt="">
                                    </div>
                                    <div class="content-">
                                        <h6>
                                            <a href="{{ url('/player?track='.urlencode($track->name.' '.$track->artists[0]->name)) }}">
                                                {{ $track->name }}
                                            </a>
                                        </h6>
                                        <a href="{{ url('/artist/'.$track->artists[0]->id) }}">
                                            <p>{{ $track->artists[0]->name }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>Popular Artist</h2>
                        </div>
                        @foreach($top_artists as $track)
                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail" style="width:75px">
                                <img style="width:75px" src="{{ $track->album->images[1]->url }}" alt="">
                            </div>
                            <div class="content-">
                                <a href="{{ url('/artist/'.$track->artists[0]->id) }}">{{ $track->artists[0]->name }}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

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
