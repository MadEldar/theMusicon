<!DOCTYPE html>
<html lang="en">
@include('musicon/partials/head')
<body>
<!-- Message -->
@include('musicon/partials/message')

<!-- Preloader -->
@include('musicon/partials/preloader')

<!-- ##### Header Area Start ##### -->
@include('musicon/partials/header')

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url('musicon/img/bg-img/breadcrumb3.jpg');">
        <div class="breadcrumbContent">
            <p>Music player</p>
            <h2>{{ $track->name }}</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <div class="section-padding-100">
        <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image:url('{{ $track->album->images[0]->url }}'); background-position: top">
            <div class="container">
                <div class="col-lg-12 col-md-6 col-sm-8" style="">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="song-player-area col-8 offset-2">
                            <!-- Spotify is dumb, can't interact with iframe -->
                            <iframe id="spotify-player" src="https://open.spotify.com/embed/album/{{ $track->album->id }}?index=3"
                                    width="100%" height="300px" allowtransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        <div class="song-lyrics-area bg-white">
                            <div class="col-3" style="float: right">
                            <img src="{{ $track->album->images[0]->url }}" alt="" width="200px" height="300px">
                            <h3>{{ $track->name }}</h3>
                            <h5 style="font-weight: normal">by {{ $track->artists[0]->name }}</h5>
                            <h5 style="font-weight: normal">from album {{ $track->album->name }}</h5>
                            <p>Main genre: <a href="{{ url('/genre?q='.$artist->genres[0]) }}">{{ ucfirst($artist->genres[0]) }}</a></p>
                            </div>
                            <div class="col-9" data-wow-delay="300ms" style="float: left; margin: -24px 0px " >
                                <button type="button" class="btn oneMusic-btn-player">Lyrics<i class="icon-music"></i></button>
                                <pre style="margin-top: 10px;max-height: 605px"></pre>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** New Hits Songs ***** -->
            </div>
        </section>
    </div>
    <!-- ##### Featured Artist Area End ##### -->

    <section class="latest-albums-area bg-dark" style="margin-bottom: 50px">
        <div class="container p-5">
            <div class="row">
                <h1 style="color:#fff;">Same Genre</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a1.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Cure</h5>
                                </a>
                                <p>Second Song</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a2.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Sam Smith</h5>
                                </a>
                                <p>Underground</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a3.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Will I am</h5>
                                </a>
                                <p>First</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a4.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Cure</h5>
                                </a>
                                <p>Second Song</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a5.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>DJ SMITH</h5>
                                </a>
                                <p>The Album</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a6.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Ustopable</h5>
                                </a>
                                <p>Unplugged</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a7.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Beyonce</h5>
                                </a>
                                <p>Songs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-albums-area" style="margin-bottom: 50px">
        <div class="container p-5">
            <div class="row">
                <h1>Same Artist</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a1.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Cure</h5>
                                </a>
                                <p>Second Song</p>
                            </div>
                        </div>
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a2.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Sam Smith</h5>
                                </a>
                                <p>Underground</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a3.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Will I am</h5>
                                </a>
                                <p>First</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a4.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Cure</h5>
                                </a>
                                <p>Second Song</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a5.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>DJ SMITH</h5>
                                </a>
                                <p>The Album</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a6.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Ustopable</h5>
                                </a>
                                <p>Unplugged</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="{{ asset('musicon/img/bg-img/a7.jpg') }}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Beyonce</h5>
                                </a>
                                <p>Songs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="genius-lyrics" class="d-none">
        {!! $lyrics !!}
    </section>
    <!-- ##### Contact Area Start ##### -->
    @include('musicon/partials/contact')
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('musicon/partials/footer')
    <!-- ##### Footer Area Start ##### -->
    <!-- ##### All Javascript Script ##### -->
    @include('musicon/partials/scripts')
<script>
    $(() => {
        $('.song-lyrics-area pre').html($('.rg_embed_body p').text());
    });
</script>
</body>
</html>
