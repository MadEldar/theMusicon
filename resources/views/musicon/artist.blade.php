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
        <h2>Artist</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

  <!-- ##### Blog Area Start ##### -->
  <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="{{asset('musicon/img/bg-img/blog1.jpg')}}" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span>15</span>
                                <span>Join</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <img src="https://loremflickr.com/40/40" alt="" style = "    border: 1px solid white; border-radius: 20px; margin-bottom: 10px;">
                            <button type="button" data-toggle="modal" data-target="#artistModal" style="border:none; font-size: 25px">
                            Name
                            </button>
                     
                            <!-- Post Excerpt -->
                            <p>Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis. Pellentesque sit amet velit a libero viverra porta non eu justo. Vivamus mollis metus sem, ac sodales dui lobortis.</p>
                        </div>
                    </div>
                    <h1>More Artist</h1>
                    <div class="row text-center">
                    <div class="col-3">
                    <a href="">
                    <img src="https://loremflickr.com/100/100" alt="" style = "   border: 1px solid white; border-radius: 50px;">
                    </a>
                    <h2>Name</h2>
                    </div>
                    <div class="col-3">
                    <a href="">
                    <img src="https://loremflickr.com/100/100" alt="" style = "    border: 1px solid white; border-radius: 50px;">
                    </a>
                    <h2>Name</h2>
                    </div>
                    <div class="col-3">
                    <a href="">
                    <img src="https://loremflickr.com/100/100" alt="" style = "    border: 1px solid white; border-radius: 50px;">
                    </a>
                    <h2>Name</h2>
                    </div>
                    <div class="col-3">
                    <a href="">
                    <img src="https://loremflickr.com/100/100" alt="" style = "    border: 1px solid white; border-radius: 50px;">
                    </a>
                    <h2>Name</h2>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
     <!-- Modal -->
    <div class="modal fade" id="artistModal" tabindex="-1" role="dialog" aria-labelledby="artistModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="artistModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Save changes</button>
            </div>
            </div>
        </div>
     </div>
<!-- ##### Buy Now Area Start ##### -->
<section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <h2>Music</h2>
                    </div>
                </div>
            </div>

            <div class="row">

        
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <img src="{{ asset('musicon/img/bg-img/b3.jpg') }}" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Jess Parker</h5>
                            </a>
                            <p>The Album</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="200ms">
                        <div class="album-thumb">
                            <img src="{{ asset('musicon/img/bg-img/b4.jpg') }}" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="{{ asset('musicon/img/bg-img/b1.jpg') }}" alt="">
                            <!-- Album Price -->
                            <div class="album-price">
                                <p>$0.90</p>
                            </div>
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="400ms">
                        <div class="album-thumb">
                            <img src="{{ asset('musicon/img/bg-img/b2.jpg') }}" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="500ms">
                        <div class="album-thumb">
                            <img src="{{ asset('musicon/img/bg-img/b3.jpg') }}" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Jess Parker</h5>
                            </a>
                            <p>The Album</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="600ms">
                        <div class="album-thumb">
                            <img src="{{ asset('musicon/img/bg-img/b4.jpg') }}" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

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
