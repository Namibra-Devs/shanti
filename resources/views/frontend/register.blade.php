@extends('frontend.layout')

@section('content')
    <!-- Login Form -->
    <div class="row w-100 h-100">
        <div class="col-4 login-img">
            <img src="{{ asset('assets/frontend/images/signupbanner.svg') }}" alt="" class="img-fluid logobanner" />
        </div>

        <div class="col-8 login-form-wrapper">
            <div class="logo text-center pt-4">
                <img src="./src/images/logo.svg" alt="" class="img-fluid" />

                @if (Session::has('sendmail'))
                    <div class="alert alert-success mb-4">
                        <p style="line-height: 24px;">{{ Session::get('sendmail') }}</p>
                    </div>
                @endif
                <div class="text-center">
                    <h1 class="pt-5 login-header">Create an Account</h1>
                    <p class="login-text">Please sign up Here.</p>
                </div>
            </div>

            <div class="login-form m-auto">
                <form class="" action="{{ route('user-register-submit') }}" method="POST">
                    <div class="mb-3">
                        <label for="fullname" class="form-label ms-1">Username</label>
                        <input class="form-control" type="text" name="username" value="{{ Request::old('username') }}">
                        @if ($errors->has('username'))
                            <p class="text-danger mb-0 mt-2">{{ $errors->first('username') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label ms-1">Email address</label>
                        <input class="form-control" type="email" name="email" value="{{ Request::old('email') }}">
                        @if ($errors->has('email'))
                            <p class="text-danger mb-0 mt-2">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label ms-1">Password</label>
                        <input class="form-control" type="password" name="password" value="{{ Request::old('password') }}">
                        @if ($errors->has('password'))
                            <p class="text-danger mb-0 mt-2">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label ms-1">Confirm Password</label>
                        <input class="form-control" type="password" name="password_confirmation"
                            value="{{ Request::old('password_confirmation') }}">
                        @if ($errors->has('password_confirmation'))
                            <p class="text-danger mb-0 mt-2">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-dark w-100 my-3">CREATE ACCOUNT</button>



                    <div class="text-center">
                        <a href="{{ route('user.login') }}" class="text-decoration-none text-black-50 px-1">Already have an account? Sign-in
                            <span><img src="{{ asset('assets/frontend/images/arrow-right.svg') }}"
                                    alt=""></span></a></p>
                    </div>
            </div>

        </div>
    </div>
@endsection
