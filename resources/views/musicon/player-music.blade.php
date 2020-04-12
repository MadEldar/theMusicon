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
    <div class="section-padding-100-0">
        <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image:url('{{ $track->album->images[0]->url }}'); background-position: top">
            <div class="container">
                <div class="col-lg-12 col-md-6 col-sm-8" style="">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="song-player-area col-8 offset-2">
                            <!-- Spotify is dumb, can't interact with iframe -->
                            <iframe id="spotify-player" src="https://open.spotify.com/embed/album/{{ $track->album->id }}"
                                    width="100%" height="300px" allowtransparency="true" allow="encrypted-media"></iframe>
                            <p class="m-0">Please select the correct song. Please.</p>
                        </div>
                        <div class="song-lyrics-area bg-white">
                            <div class="col-3" style="float: right">
                            <img src="{{ $track->album->images[0]->url }}" alt="" width="200px" height="300px">
                            <h3>{{ $track->name }}</h3>
                            <h5 style="font-weight: normal">
                                by <a href="{{ url("/artist/$artist->id") }}" style="font-size: 1.25rem">{{ $artist->name }}</a>
                            </h5>
                            <h5 style="font-weight: normal">from album {{ $track->album->name }}</h5>
                            <p>
                                Main genre:
                                <a href="{{ $genre != 'None' ? url('/genres?q='.$genre) : '#' }}">
                                    {{ ucfirst($genre) }}
                                </a>
                            </p>
                            </div>
                            <div class="col-9" data-wow-delay="300ms" style="float: left; margin: -24px 0px">
                                <button type="button" class="btn oneMusic-btn-player" id="more-lyrics" data-index="1">
                                    Lyrics (click for another version)<i class="icon-music"></i>
                                </button>
                                <!-- Sometimes lyrics are dumb, blame Genius, the ironic name -->
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

    <section class="section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="comments">
                        <div class="comments-details">
                            <span class="total-comments comments-sort">117 Comments</span>
                        </div>
                        @if(Auth::check())
                            <div class="comment-box add-comment">
                                <span class="commenter-name">
                                    <input type="text" placeholder="Add a public comment" name="Add Comment">
                                    <button type="submit" class="btn btn-dark">Comment</button>
                                    <button type="cancel" class="btn btn-default">Cancel</button>
                                </span>
                            </div>
                        @else
                            <div class="text-center mb-4">
                                <a href="{{ url('/sign-in') }}">Sign in</a> or
                                <a href="{{ url('/sign-up') }}">Sign up</a> to leave a comment
                            </div>
                        @endif
                        <div class="comment-box">
                            <span class="commenter-name">
                                <a href="#">Happy uiuxStream</a> <span class="comment-time">2 hours ago</span>
                            </span>
                            <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
                            <div class="comment-meta">
                                <button class="comment-reply reply-popup"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>
                            </div>
                            <div class="comment-box add-comment reply-box">
                                <span class="commenter-pic">
                                    <img src="/images/user-icon.jpg" class="img-fluid">
                                </span>
                                <span class="commenter-name">
                                    <input type="text" placeholder="Add a public reply" name="Add Comment">
                                    <button type="submit" class="btn btn-default">Reply</button>
                                    <button type="cancel" class="btn btn-default reply-popup">Cancel</button>
                                </span>
                            </div>
                        </div>
                        <div class="comment-box">
                            <span class="commenter-name">
                                <a href="#">Happy uiuxStream</a> <span class="comment-time">2 hours ago</span>
                            </span>
                            <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
                            <div class="comment-meta">
                                <button class="comment-reply"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>
                            </div>
                            <div class="comment-box replied">
                                <span class="commenter-name">
                                    <a href="#">Happy uiuxStream</a> <span class="comment-time">2 hours ago</span>
                                </span>
                                <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
                                <div class="comment-meta">
                                    <button class="comment-reply"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>
                                </div>
                                <div class="comment-box replied">
                                    <span class="commenter-name">
                                        <a href="#">Happy uiuxStream</a> <span class="comment-time">2 hours ago</span>
                                    </span>
                                    <p class="comment-txt more">Suspendisse massa enim, condimentum sit amet maximus quis, pulvinar sit amet ante. Fusce eleifend dui mi, blandit vehicula orci iaculis ac.</p>
                                    <div class="comment-meta">
                                        <button class="comment-reply"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-albums-area bg-dark" style="margin-bottom: 50px">
        <div class="container p-5">
            <div class="row">
                <h1 style="color:#fff;">Same Genre</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($same_genre as $track)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ $track->album->images[0]->url }}" alt="">
                                <div class="album-info">
                                    <a href="{{ url('/player?track='. urlencode($track->name.' '.$track->artists[0]->name)) }}">
                                        <h5>{{ $track->name }}</h5>
                                    </a>
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
                <h1>Same Artist</h1>
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach($same_artist as $track)
                            <!-- Single Album -->
                            <div class="single-album">
                                <img src="{{ $track->album->images[0]->url }}" alt="">
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
        $('.song-lyrics-area pre').html(
            $('.rg_embed_body p').text() != '' ?
                $('.rg_embed_body p').text() :
                'There is no lyric for this song.'
        );
        $(".reply-popup").click(function(){
            $(".reply-box").toggle();
        });
    });
</script>
</body>
</html>
