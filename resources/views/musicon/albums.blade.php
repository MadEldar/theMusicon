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

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-category section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('/albums') }}" method="get" class="browse-by-categories category-menu d-flex flex-wrap align-items-center mb-70">
                        <a style="font-weight: normal; margin-right: 0.5rem" href="{{ url('/albums?q=all') }}"  data-filter="*"
                           @if($_GET['q'] == 'all') class="active" @endif>Browse All</a>
                        @foreach(range('A', 'Z') as $val)
                            <a style="font-weight: normal; margin-right: 0.5rem" href="{{ url('/albums?q='.$val) }}" data-filter=".{{$val}}"
                               @if($_GET['q'] == $val) class="active" @endif>{{$val}}</a>
                        @endforeach
                        @foreach(range('0', '9') as $val)
                            <a style="font-weight: normal; margin-right: 0.5rem" href="{{ url('/albums?q='.$val) }}" data-filter=".{{$val}}"
                               @if($_GET['q'] == $val && $_GET['q'] != 0) class="active" @endif>{{$val}}</a>
                        @endforeach
                        <span class="pr-2">or</span>
                        <input type="text" class="form-control w-25 float-right pl-2" name="q">
                    </form>
                </div>
            </div>
            <div class="row oneMusic-albums justify-content-center">
                @forelse($albums as $album)
                    <!-- Single Album -->
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <img src="{{ isset($album->images[1]) ? $album->images[1]->url : asset('/musicon/img/bg-img/artist-default.png') }}" alt="">
                            <div class="album-info">
                                <a href="{{ url("/album?q=$album->id") }}">
                                    <h5>{{ $album->name }}</h5>
                                </a>
                                <a href="{{ url('/artist/'.$album->artists[0]->id) }}"><p>{{ $album->artists[0]->name }}</p></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4 class="text-center">No matching album</h4>
                @endforelse
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
                        @if(sizeof($albums) == 24)
                            <button id="more-albums" data-target="albums" data-offset="0" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></button>
                        @else
                            <p>No more albums</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Load More Area End ##### -->

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
