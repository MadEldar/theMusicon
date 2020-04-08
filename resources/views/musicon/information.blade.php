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
        <p>Your Information</p>
        <img src="https://loremflickr.com/70/70" alt="" style = "    border: 1px solid white; border-radius: 20px; margin-bottom: 10px;">
        <button type="button" data-toggle="modal" data-target="#editInfor" style="border:none; font-size: 25px">
            <h2>Name</h2>
        </button>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area" >
    <div class="container">
        <div class="row">
            <div class="col-3" style="padding: 50px 0;">
                <div class="blog-sidebar-area">

                    <!-- Widget Area -->
                    <div class="single-widget-area mb-30">
                        <img src="https://loremflickr.com/40/40" alt="" style = "border: 1px solid white; border-radius: 20px; padding: 40px 40px 0">
                        <div class="widget-title">
                            <h5>Name</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="#">Account ---------------------------------></a></li>
                                <li><a href="#">Favorite</a></li>
                                <li><a href="#">Playlist</a></li>
                                <li><a href="#">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Widget Area -->
                    <div class="single-widget-area mb-30">
                        <a href="#"><img src="{{asset('musicon/img/bg-img/add.gif')}}" alt=""></a>
                    </div>
                </div>
            </div>

            <div class="col-9" style="padding: 50px;">
                <h3>Manage Account</h3>

                <div class="row">
                    <div class="col-6">
                        <div style="border: 0.5px solid black; margin-bottom: 10px; ">
                            <h2>Information</h2>
                            <hr class="m-0">
                            <p>Name:</p>
                            <p>Birth of date:</p>
                            <p>Phone:</p>
                            <p>Gender:</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="border: 0.5px solid black;margin-bottom: 10px;">
                            <h2>Account </h2>
                            <hr class="m-0">
                            <p>Username: </p>
                            <p>Email: </p>
                            <p>Password: </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="border: 0.5px solid black">
                            <h2>Playlist </h2>
                            <hr class="m-0">
                            <a href="#"><img src="{{asset('musicon/img/bg-img/add.gif')}}" alt="" style="padding: 20px"></a>

                        </div>
                    </div>
                    <div class="col-6" >
                        <div style="border: 0.5px solid black">
                            <h2>Favorite </h2>
                            <hr class="m-0">
                            <a href="#"><img src="{{asset('musicon/img/bg-img/add.gif')}}" alt="" style="padding: 20px"></a>
x
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="editInfor" tabindex="-1" role="dialog" aria-labelledby="editInfor" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInfor">Edit profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Username: theMusicon</h5>
                <form>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-gradient-dark">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ##### Blog Area End ##### -->

<!-- ##### Footer Area Start ##### -->
@include('musicon/partials/footer')
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
@include('musicon/partials/scripts')
</body>

</html>
