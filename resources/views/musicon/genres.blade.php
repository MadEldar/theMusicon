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
            <h2>Popular in this genre</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-category section-padding-100-0">
        <div class="col-10 offset-1">
            <div class="row">
                <div class="col-3">
                    <form action="{{ url('/genres')}}" method="get" class="browse-by-categories category-menu d-flex flex-wrap align-items-center mb-70">
                        @foreach($genres as $val)
                        <button type="submit" name="q" value="{{$val}}" data-filter=".{{$val}}" @if($_GET['q'] == $val) class="active" @endif>{{$val}}</button>
                        @endforeach
                    </form>
                </div>
                <div class="col-9">
                    <div class="row oneMusic-albums justify-content-center">
                        @forelse($tracks as $track)
                            <!-- Single Album -->
                            <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                                <div class="single-album">
                                    <img src="{{ isset($track->album->images[1]) ? $track->album->images[1]->url : asset('/musicon/img/bg-img/artist-default.png')}}" alt="">
                                    <div class="album-info">
                                        <a href="{{ url('/player?track='. urlencode($track->name.' '.$track->artists[0]->name)) }}">
                                            <h5>{{ $track->name }}</h5>
                                        </a>
                                        <p>{{ $track->artists[0]->name }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="text-center">No matching track</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Album Catagory Area End ##### -->

    <!-- ##### Load More Area Start ##### -->
    <div class="oneMusic-buy-now-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center">
                        <button id="more-genres" data-target="genres" data-offset="0" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Load More Area End ##### -->

    <!-- ##### Add Area Start ##### -->
    <div class="add-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="adds">
                        <a href="#"><img src="{{asset('musicon/img/bg-img/add3.gif')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Add Area End ##### -->

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
