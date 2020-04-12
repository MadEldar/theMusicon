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
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{ url('/musicon/img/bg-img/breadcrumb3.jpg') }});">
        <div class="breadcrumbContent">
            <p>Music player</p>
            <h2>{{ $artistS->name }}</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <div class="section-padding-100-0">
        <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed"
                 style="background-image:url('{{ $artistS->images[0]->url }}');background-position:center;">
            <div class="container">
                <div class="col-lg-12 col-md-6 col-sm-8" style="">
                    <div class="featured-artist-content">
                        <div class="song-lyrics-area bg-white" id="lyrics-area" style="min-height: 400px">
                            <div class="col-3" style="float: right">
                                <img src="{{ $artistS->images[0]->url }}" alt="" width="200px" height="300px">
                                <h3>{{ $artistS->name }}</h3>
                                <h5 style="font-weight: normal">Followers: {{ number_format($artistS->followers->total, 0) }}</h5>
                                <h5 style="font-weight: normal">Popularity: {{ $artistS->popularity }}</h5>
                                <h5 style="font-weight: normal">Genre:</h5>
                                @forelse($genres as $genre)
                                    <a class="pr-2" href="{{ url("/genres?q=$genre") }}">{{ ucfirst($genre) }}</a>
                                @empty
                                    <span>No genre</span>
                                @endforelse
                            </div>
                            <div class="col-9 p-5" data-wow-delay="300ms" style="float: left; margin: -24px 0px">
                                <span style="white-space: pre-line">
                                    {!! $artistL->bio->content ?? '<p>Cannot find artist\'s bio' !!}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** New Hits Songs ***** -->
            </div>
        </section>
    </div>
    <!-- ##### Featured Artist Area End ##### -->

    <section class="latest-albums-area" style="margin-bottom: 50px">
        <div class="container p-5">
            <div class="row">
                <h1>Top tracks</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($tracks as $track)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ $track->album->images[1]->url }}" alt="">
                                <div class="album-info">
                                    <a href="{{ url('/player?track='. urlencode($track->name.' '.$track->artists[0]->name)) }}">
                                        <h5>{{ $track->name }}</h5>
                                    </a>
                                    <p>{{ $track->album->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-albums-area bg-dark">
        <div class="container p-5">
            <div class="row">
                <h1 class="text-white">All albums</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($albums as $album)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ $album->images[1]->url }}" alt="">
                                <div class="album-info">
                                    <a href="{{ url("/album?q=$album->id") }}">
                                        <h5 class="text-white">{{ $album->name }}</h5>
                                    </a>
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
    <script>
        $(() => {
            $('#lyrics-area').css('height', $('#lyrics-area .col-9').css('height'));
        });
    </script>
</body>
</html>
