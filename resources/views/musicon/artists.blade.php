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
            <h2>Popular artists</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-category section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ url('/artists') }}" method="get" class="browse-by-categories category-menu d-flex flex-wrap align-items-center mb-70">
                        <a style="font-weight: normal;margin-right: 0.5rem" href="{{ url('/albums?q=all') }}" data-filter="*" @if($_GET['q'] == 'all') class="active" @endif>Browse All</a>
                        @foreach(range('A', 'Z') as $val)
                        <a style="font-weight: normal;margin-right: 0.5rem" href="{{ url('/albums?q='.$val) }}" data-filter=".{{$val}}" @if($_GET['q'] == $val) class="active" @endif>{{$val}}</a>
                        @endforeach
                        @foreach(range('0', '9') as $val)
                        <a style="font-weight: normal;margin-right: 0.5rem" href="{{ url('/albums?q='.$val) }}" data-filter=".{{$val}}" @if($_GET['q'] == $val && $_GET['q'] != 0) class="active" @endif>{{$val}}</a>
                        @endforeach
                        <span class="pr-2">or</span>
                        <input type="text" placeholder="Search here" class="form-control w-25 float-right pl-2" name="q" style="margin-right: 0.5rem; margin-top: 0.5rem">
                        <button type="submit" class="mt-2"  style="background: none; border: 2px solid black"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
            <div class="row oneMusic-albums justify-content-center">
                @forelse($artists as $artist)
                    <!-- Single Album -->
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p">
                        <div class="single-album">
                            <img src="{{ isset($artist->images[1]) ? $artist->images[1]->url : asset('/musicon/img/bg-img/artist-default.png')}}" alt="">
                            <div class="album-info">
                                <a href="{{ url('/artist/'.$artist->id) }}">
                                    <h5>{{ $artist->name }}</h5>
                                </a>
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
                        <button id="more-artists" data-target="artists" data-offset="0" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></button>
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
