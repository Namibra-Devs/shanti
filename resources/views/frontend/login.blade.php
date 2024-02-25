@extends('frontend.layout')

@section('content')
    <!-- Login Form -->
    <div class="row w-100">
        <div class="col-4">
            <img src="{{{ asset('assets/frontend/images/loginbanner.svg')}}}" alt="" class="img-fluid logobanner" />
        </div>

        <div class="col-8">
            <div class="logo text-center pt-5">
                <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="" class="img-fluid" />

                <div class="text-center">
                    <h1 class="pt-5 login-header">Hello, Let's Sign You In</h1>
                    <p class="login-text">Please sign in Here.</p>
                </div>
            </div>

            <div class="login-form m-auto">
                <form id="loginForm" action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="emailaddress" class="form-label ms-1">Email address</label>
                        <input type="email" class="form-control" id="emailaddress" name="email">
                        @if (Session::has('err'))
                            <p class="text-danger mb-2 mt-2">{{ Session::get('err') }}</p>
                        @endif
                        @error('email')
                            <p class="text-danger mb-2 mt-2">{{ convertUtf8($message) }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label ms-1">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <p class="text-danger mb-2 mt-2">{{ convertUtf8($message) }}</p>
                        @enderror
                    </div>
                    <div class="my-3 form-check d-flex justify-content-between mx-2">
                        <div>
                            <input type="checkbox" class="form-check-input" id="rememberme">
                            <label class="form-check-label" for="rememberme">Remember me</label>
                        </div>
                        <div>
                            <a href="#" class="text-decoration-none text-dark">Forgot Password?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 my-3">SIGN IN</button>
                    <div class="text-center">
                        <a href="signup.html" class="text-decoration-none text-black-50 px-1">CREATE AN
                            ACCOUNT<span><img src="{{ asset('assets/frontend/images/arrow-right.svg') }}" alt=""></span></a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
