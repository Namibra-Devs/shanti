<!-- Navbar Large Screens -->
<nav class="navbar bg-change navbar-expand-lg d-none d-lg-block fixed-top">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center container" id="navbarSupportedContent">
            <div class="m-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" aria-current="page" href="{{ route('front.product') }}">COLLECTIONS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">CONTACT US</a>
                    </li>
                </ul>
            </div>

            <div class="logo m-auto text-center mt-0">
                <a class="navbar-brand" href="#"><img src="{{ asset('assets/frontend/images/logo.svg') }}" alt=""
                        class="img-fluid"></a>
            </div>


            <div class=" m-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item mx-2" id="cartIconWrapper">
                        <a class="nav-link text-uppercase" href="{{ route('front.cart') }}"><img src="{{ asset('assets/frontend/images/cart.svg') }}"
                                alt="" class="pe-2" />
                            <span class="position-relative">

                                CART<span
                                    class="badge bg-badge position-absolute top-0 start-100 translate-middle length">{{ cartLength() }}</span>
                            </span>
                        </a>
                    </li>
                    {{-- <li class="nav-item mx-2">
                        <a class="nav-link text-uppercase" href="./wishlist.html"><img src="{{ asset('assets/frontend/images/heart.svg') }}"
                                alt="" class="pe-1" />
                            <span class="position-relative">

                                WAITLIST<span
                                    class="badge bg-badge position-absolute top-0 start-100 translate-middle">4</span>
                            </span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item mx-2">
                        <button type="button" class="btn btn-transparent mx-4 border-0" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <img src="{{ asset('assets/frontend/images/search.svg') }}" alt="">
                        </button>

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Search Your Favorite
                                            Jewelry</h5>
                                        <button type="button" class="btn-close search-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex gap-1">
                                        <input type="text" class="form-control border-2 border-dark-50 search-input"
                                            placeholder="Eg: Bracelets">
                                        <a href="{{ route('user.login') }}" class="btn btn-search"><img src="{{ asset('assets/frontend/images/search.svg') }}"
                                                alt="" class="img-fluid"></a>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </li> --}}
                    @guest
                        <li class="nav-item mx-2">
                            <a href="{{ route('user.login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                    <li>
                        <div class="language dashboard">
                            <a class="language-btn" href="#">
                                <i class="far fa-user"></i> {{Auth::user()->username}}
                            </a>
                            <ul class="language-dropdown">
                                <li>
                                    <a href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a>
                                </li>
    
                                    <li><a href="{{route('user-orders')}}">{{__('Product Orders')}} </a></li>
                                <li>
                                    <a href="{{route('user-profile')}}">{{__('Edit Profile')}}</a>
                                </li>
    
                                    <li>
                                        <a href="{{route('shpping-details')}}">{{__('Shipping Details')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('billing-details')}}">{{__('Billing Details')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user-reset')}}">{{__('Change Password')}}</a>
                                    </li>
                                <li>
                                    <a href="{{route('user-logout')}}" target="_self">{{__('Logout')}}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar Small Screens -->
<nav class="navbar navbar-bg d-lg-none d-block fixed-top">
    <div class="container-fluid">
        <div class="d-flex justify-content-between w-100">

            <div class="">
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContentul" aria-controls="navbarSupportedContentul"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <img src="{{ asset('assets/frontend/images/menu.svg') }}" alt="">
                </button>
            </div>
            <div class="ps-5 text-center m-auto">
                <a class="navbar-brand" href="#"><img src="{{ asset('assets/frontend/images/logo.svg') }}" alt=""
                        class="img-fluid w-25"></a>
            </div>

            {{-- <div>
                <button type="button" class="btn btn-transparent mx-4 border-0" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <img src="{{ asset('assets/frontend/images/search.svg') }}" alt="">
                </button>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Search Your Favorite Jewelry</h5>
                                <button type="button" class="btn-close search-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex gap-1">
                                <input type="text" class="form-control border-2 border-dark-50 search-input"
                                    placeholder="Eg: Bracelets">
                                <button type="button" class="btn btn-dark"><img src="{{ asset('assets/frontend/images/logo2.svg') }}"
                                        alt="" class="img-fluid"></button>

                            </div>

                        </div>
                    </div>
                </div>

            </div> --}}
        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContentul">
            <ul class="navbar-nav mb-4 mb-lg-0 gap-3 text-center bg-other">
                <li class="nav-item">
                    <a class="nav-link text-uppercase active" aria-current="page" href="{{ route('front.product') }}">Barrette</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{ route('front.product') }}">Rings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{ route('front.product')}}">Brooch</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{ route('front.product') }}">collections</a>
                </li>
                @guest
                        <li class="nav-item mx-2">
                            <a href="{{ route('user.login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                    <li>
                        <div class="language dashboard">
                            <a class="language-btn" href="#">
                                <i class="far fa-user"></i> {{Auth::user()->username}}
                            </a>
                            <ul class="language-dropdown">
                                <li>
                                    <a href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a>
                                </li>
    
                                    <li><a href="{{route('user-orders')}}">{{__('Product Orders')}} </a></li>
                                <li>
                                    <a href="{{route('user-profile')}}">{{__('Edit Profile')}}</a>
                                </li>
    
                                    <li>
                                        <a href="{{route('shpping-details')}}">{{__('Shipping Details')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('billing-details')}}">{{__('Billing Details')}}</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user-reset')}}">{{__('Change Password')}}</a>
                                    </li>
                                <li>
                                    <a href="{{route('user-logout')}}" target="_self">{{__('Logout')}}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endauth
            </ul>

        </div>
    </div>
</nav>
