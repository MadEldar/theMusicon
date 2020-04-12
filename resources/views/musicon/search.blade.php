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
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{ asset('/musicon/img/bg-img/breadcrumb3.jpg') }});">
        <div class="breadcrumbContent">
            <p>See what’s new</p>
            <h2>Latest Albums</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="pl-5 pb-4">Artists</h2>
                    <div class="row text-center">
                        @foreach($artists as $artist)
                            <div class="col-3 search-artist">
                                <a href="{{ url('/artist/'.$artist->id) }}">
                                    <img src="{{ $artist->images != [] ? $artist->images[1]->url : asset('/musicon/img/bg-img/artist-default.png') }}">
                                    <h5>{{ $artist->name }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="latest-albums-area bg-dark" style="margin-bottom: 50px">
        <div class="container p-5">
            <div class="row">
                <h1 style="color:#fff;">Albums</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($albums as $album)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ $album->images != [] ? $album->images[1]->url : asset('/musicon/img/bg-img/artist-default.png') }}" alt="">
                                <div class="album-info">
                                    <a href="{{ url('/album?q='.$album->id) }}">
                                        <h5>{{ $album->name }}</h5>
                                    </a>
                                    <a href="{{ url('/artist/'.$album->artists[0]->id) }}"><p>{{ $album->artists[0]->name }}</p></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-albums-area" style="margin-bottom: 50px">
        <div class="container p-5">
            <div class="row">
                <h1>Tracks</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($tracks as $track)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ $track->album->images != [] ? $track->album->images[1]->url : asset('/musicon/img/bg-img/artist-default.png') }}" alt="">
                                <div class="album-info">
                                    <a href="{{ url('/player?track='. urlencode($track->name.' '.$track->artists[0]->name)) }}">
                                        <h5>{{ $track->name }}</h5>
                                    </a>
                                    <p>{{ $track->artists[0]->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

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
