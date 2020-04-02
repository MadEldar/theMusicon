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
            <p>See what’s new</p>
            <h2>Sign up</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="{{ url('/sign-up') }}" method="post" class="container">
                                @csrf
                                <div class="form-group">
                                    <label for="emailField">Email address</label>
                                    <input type="email" name="user_email" class="form-control" id="emailField"
                                           aria-describedby="emailHelp" placeholder="Enter E-mail" value="{{ old('user_email') }}">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group col-6 pl-0 float-left">
                                    <label for="firstNameField">First name</label>
                                    <input type="text" name="first_name" class="form-control" id="firstNameField"
                                           aria-describedby="emailHelp" placeholder="Enter first name" value="{{ old('user_email') }}">
                                </div>
                                <div class="form-group col-6 pr-0 float-left">
                                    <label for="lastNameField">Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="lastNameField"
                                           aria-describedby="emailHelp" placeholder="Enter last name" value="{{ old('user_email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="passwordField">Password</label>
                                    <input type="password" name="password" class="form-control" id="passwordField" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirmField">Confirm password</label>
                                    <input type="password" name="confirm" class="form-control" id="confirmField" placeholder="Confirm password">
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Sign up</button>
                            </form>
                            <a type="submit" class="btn oneMusic-btn mt-30 " href="{{ url('/login') }}">Sign in</a>
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
