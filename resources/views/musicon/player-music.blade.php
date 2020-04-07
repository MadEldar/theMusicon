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


<!-- ##### Featured Artist Area Start ##### -->
<div class="section-padding-100">
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image:url('musicon/img/bg-img/bg-4.jpg');">
        <div class="container">
                <div class="col-lg-9 col-md-6 col-sm-8" style="float: right">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>Buy What’s New</h2>
                        </div>
{{--                        <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum at ipsum ac, dignissim iaculis ante. Donec in velit non elit pulvinar pellentesque et non eros.</p>--}}
                        <div class="song-player-area">
                            <iframe src="https://open.spotify.com/embed/album/1DFixLWuPkv3KT3TnV35m3" width="100%" height="151px" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
{{--                            <iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/846344336&color=%231b0809&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>--}}
                        </div>
                        <div class="song-lyrics-area bg-white">
                            <div class="col-4" style="float: right">
                            <img src="{{ asset('musicon/img/bg-img/fa.jpg') }}" alt="" width="200px" height="300px">
                            <h1>Name</h1>
                            <h2>Age</h2>
                            <h3>Genre</h3>
                            </div>

                            <div class="col-8" data-wow-delay="300ms" style="float: left; margin: -24px 0px " >
                                <a href="#" class="btn oneMusic-btn-player">Lyrics<i class="icon-music"></i></a>
                                <a href="#" class="btn oneMusic-btn-player">Download<i class="icon-download"></i></a>
                                <a href="#" class="btn oneMusic-btn-player">Share<i class="icon-share"></i></a>
                                <a href="#" class="btn oneMusic-btn-player">Favorite <i>+</i></a>
                                <pre style="overflow-y: scroll; margin-top: 10px;border: 13px solid pink;max-height: 605px">
naneun geuge cham himdeun geot gata saenggageul meomchundaneun ge
kkoriui kkoril mulgo meomchuneun geol meomchwojwo

naman eoryeoun geot gateun gibun ireol ttaen meomchugo sipeunde
What about you What do you think about

iraessdajeoraessda wassda gassda sel suga eopseo more jebal jom meomchwojwo

Stop it I don’t wanna think anymore honey
Even the one telling me to stop it I don’t want to even think about it

Can’t I really stop things around me saenggageul meomchuneun saenggak stop it
I don’t want to even think about it And you

What do you think about What do you think about

Yeah neomunado ssaneulhae I don’t wanna think about it
Yeah uh eoneusae jinagan gyeoul il nyeondo neomu jjalpne sumanheun ireul gyeokkeun hu
pureonaeneun problems saenggakhamyeon an doendaneun
saenggageul hage dwae ijen bonaejul ttaega dwaessneunde
ajikdo namaisseonae meori ane

naega da mianhae ani ije waseon da ihaehae
nan tto wassda gassda olhaedo jeongsini eopseo
ijen geunyang siganeul da meomchugo sipeo
Yeah eumageul eonjebuteo ireohge haesseulkka
doragago sipeo sunsuhaessdeon geu sungan
ijen haenimboda dalnimege mureobwa
chagapda yeongiro ssahin gilgeoriga

naega da mianhae ani ije waseon da ihaehae
nan tto wassda gassda olhaedo jeongsini eopseo
ijen geunyang siganeul da meomchugo sipeo
Yeah eumageul eonjebuteo ireohge haesseulkka
doragago sipeo sunsuhaessdeon geu sungan
ijen haenimboda dalnimege mureobwa
chagapda yeongiro ssahin gilgeoriga


naega da mianhae ani ije waseon da ihaehae
nan tto wassda gassda olhaedo jeongsini eopseo
ijen geunyang siganeul da meomchugo sipeo
Yeah eumageul eonjebuteo ireohge haesseulkka
doragago sipeo sunsuhaessdeon geu sungan
ijen haenimboda dalnimege mureobwa
chagapda yeongiro ssahin gilgeoriga
                                </pre>
                            </div>
                        </div>
                        <div class="featured-artist-thumb">
                        </div>
                    </div>
                </div>
                <!-- ***** New Hits Songs ***** -->
                <div class="col-lg-3 col-md-6 col-sm-4">
                    <div class="sidebar-player">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>
                        <hr>
                        <ul style="max-height: 800px; overflow-y: scroll    ">
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                            <!-- Single Top Item -->
                                    <div class="first-part d-flex align-items-center">
                                        <div class="thumbnail-player">
                                            <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                        </div>
                                        <div class="content-player">
                                            <p>Sam Smith</p>
                                            <p>Underground</p>
                                        </div>
                                    </div>
                                    <audio preload="auto" controls>
                                        <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                    </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                            <li class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                                <!-- Single Top Item -->
                                <div class="first-part d-flex align-items-center">
                                    <div class="thumbnail-player">
                                        <img src="{{ asset('musicon/img/bg-img/wt7.jpg') }}" alt="" class="img-player">
                                    </div>
                                    <div class="content-player">
                                        <p>Sam Smith</p>
                                        <p>Underground</p>
                                    </div>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="{{ asset('musicon/audio/dummy-audio.mp3') }}">
                                </audio>
                            </li>
                        </ul>
                    </div>
                </div>
            <!-- ##### Miscellaneous Area End ##### -->
            </div>
    </section>
</div>
<!-- ##### Featured Artist Area End ##### -->
    <section class="latest-albums-area " style="margin-bottom: 50px">
        <div class="container">
            <div class="row ">
                <h1>Same Albums</h1>
                <div class="col-12 ">
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


    <section class="latest-albums-area bg-dark" style="margin-bottom: 50px">
        <div class="container">
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
        <div class="container">
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
