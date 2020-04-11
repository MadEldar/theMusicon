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
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url({{ '/musicon/img/bg-img/breadcrumb3.jpg' }});">
        <div class="breadcrumbContent">
            <p>See what’s new</p>
            <h2>Sign in</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="#" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="emailField">Email address</label>
                                    <input type="email" class="form-control" id="emailField" name="user_email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="passwordField">Password</label>
                                    <input type="password" class="form-control" id="passwordField" name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Sign in</button>
                            </form>
                            <a class="btn oneMusic-btn mt-30 " href="{{url('/sign-up')}}">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('musicon/partials/footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    @include('musicon/partials/scripts')
</body>

</html>
