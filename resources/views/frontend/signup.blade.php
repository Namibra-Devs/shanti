@extends('frontend.layout')

@section('content')
      <!-- Login Form -->
      <div class="row w-100 h-100">
        <div class="col-4">
            <img src="./src/images/signupbanner.svg" alt="" class="img-fluid logobanner" />
        </div>

        <div class="col-8">
            <div class="logo text-center pt-4">
                <img src="./src/images/logo.svg" alt="" class="img-fluid" />

                <div class="text-center">
                    <h1 class="pt-5 login-header">Create an Account</h1>
                    <p class="login-text">Please sign up Here.</p>
                </div>
            </div>

            <div class="login-form m-auto">
                <form class="">
                    <div class="mb-3">
                        <label for="fullname" class="form-label ms-1">Full Name</label>
                        <input type="text" class="form-control" id="emailaddress">
                    </div>

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label ms-1">Email address</label>
                        <input type="email" class="form-control" id="emailaddress">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label ms-1">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-dark w-100 my-3">CREATE ACCOUNT</button>

                    <div class="text-center">
                        <a href="login.html" class="text-decoration-none text-black-50 px-1">SIGN IN TO YOUR ACCOUNT
                            <span><img src="./src/images/arrow-right.svg" alt=""></span></a></p>
                    </div>


            </div>

        </div>
    </div>
@endsection