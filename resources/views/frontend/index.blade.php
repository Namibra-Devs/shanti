@extends('frontend.layout')

@section('content')
    <!-- Hero Header Large Screen-->
    <div class="container-fluid d-none d-md-block">
        <div class="hero-img">
        </div>
        <div class="row m-auto hero-text justify-content-center align-items-center">
            <h1 class="text-center col-lg-8">Custom jewelry for yourself, friends, family, and special occasions.</h1>

            <div class="text-center my-5">
                <a href="{{ route('front.product') }}" class="btn btn-dark px-5 rounded-1">EXPLORE COLLECTION</a>
            </div>
        </div>
    </div>
    <!-- Hero Header Small Screen -->
    <div class="container-fluid d-block d-md-none">
        <div class="hero-img">
        </div>
        <div class="row m-auto hero-text justify-content-center align-items-center">
            <h1 class="text-center col-lg-8">Custom jewelry for yourself, friends, family, and special occasions.</h1>

            <div class="text-center my-5">
                <a href="{{ route('front.product') }}" class="btn btn-dark px-5 rounded-1 text-uppercase">Search catalog</a>
                {{-- <a href="./collections.html" class="btn mt-3 px-5 rounded-1 text-uppercase">Read Our Care Guide</a> --}}
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    <div class="container my-5">
        <div class="mt-5 pt-5">
            <h2 class="text-center header">Featured Products</h2>
            <p class="text-center text-muted">Essential products, best values, lower prices</p>
        </div>

        <div class="page-content page-container d-lg-block product-area" id="page-content">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card border-0 rounded-0 shadow-none bg-transparent">
                        <div class="card-body">
                            <div class="owl-carousel">
                                @foreach ($products as $product)
                                    <div class="item">
                                        <div class="shop-item">
                                            <div class="shop-thumb">
                                                <img class="lazy"
                                                    data-src="{{ asset('assets/frontend/images/product/featured/' . $product->feature_image) }}"
                                                    alt="">
                                                <ul>
                                                    <li><a href="{{ route('front.product.checkout', $product->slug) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('Order Now') }}"><i
                                                                class="far fa-credit-card"></i></a></li>

                                                    <li><a class="cart-link"
                                                            data-href="{{ route('add.cart', $product->id) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('Add to Cart') }}"><i
                                                                class="fas fa-shopping-cart"></i></a></li>

                                                    <li><a href="{{ route('front.product.details', $product->slug) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ __('View Details') }}"><i class="fas fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="shop-content text-center">
                                                <div class="rate">
                                                    <div class="rating" style="width:{{ $product->rating * 20 }}%">
                                                    </div>
                                                </div>
                                                <a class="mt-3"
                                                    href="{{ route('front.product.details', $product->slug) }}">
                                                    {{ strlen($product->title) > 40 ? mb_substr($product->title, 0, 40, 'utf-8') . '...' : $product->title }}
                                                </a> <br>

                                                <span>
                                                    GH₵ {{ $product->current_price }}
                                                    @if (!empty($product->previous_price))
                                                        <del> <span class="prepice">
                                                                {{ $product->previous_price }}</span></del>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Collections -->
    <div class="featured-collections">

        <div class="container my-5 py-5 px-5 px-lg-0">
            <div class="">
                <h4 class="">Featured Collections</h4>
            </div>

            <div class="d-flex flex-column flex-lg-row justify-content-around mt-4 gap-4">
                <div class="border border-2 border-black-50 rounded-2 m-0 px-0 collections">
                    <div class="d-flex gap-4">
                        <img src="{{ asset('assets/frontend/images/rectangle.png') }}" alt=""
                            class="img-fluid collection-img">
                        <div class="py-3">
                            <h6>BEST SELLERS</h6>
                            <p>Discover our most sought-after pieces that have captured the hearts of our customers.</p>
                        </div>
                    </div>
                </div>

                <div class="border border-2 border-black-50 rounded-2 m-0 px-0 ollections">
                    <div class="d-flex gap-4">
                        <img src="{{ asset('assets/frontend/images/rectangle2.png') }}" alt=""
                            class="img-fluid collection-img">
                        <div class="py-3">
                            <h6>NEW ARRIVALS</h6>
                            <p>Be the first to explore our latest additions that reflect the latest trends and timeless
                                beauty</p>
                        </div>
                    </div>
                </div>

                <div class="border border-2 border-black-50 rounded-2 m-0 px-0 ollections">
                    <div class="d-flex gap-4">
                        <img src="{{ asset('assets/frontend/images/rectangle.png') }}" alt=""
                            class="img-fluid collection-img">
                        <div class="py-3">
                            <h6>BEST OFFERS</h6>
                            <p>Take advantage of our exclusive offers to elevate your jewelry collection without breaking
                                the bank</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Categories -->
    <div class="container my-5 pt-3 pb-5">
        <div class="text-center my-5">
            <h1 class="header">Categories</h1>
        </div>

        <div class="row gap-2 justify-content-center">
            <div class="col-lg-2 col-10 border border-dark-50 border-2 py-2">
                <div class="text-center py-4">
                    <img src="{{ asset('assets/frontend/images/product/rings.svg') }}" alt="" class="image-fluid">
                </div>

                <div class="text-center">
                    <h5>RINGS</h5>
                    {{-- <p class="text-muted"><span>56</span> items</p> --}}
                </div>
            </div>
            <div class="col-lg-2 col-10 border border-dark-50 border-2 py-2">
                <div class="text-center py-4">
                    <img src="{{ asset('assets/frontend/images/product/Earring.svg') }}" alt=""
                        class="image-fluid">
                </div>

                <div class="text-center">
                    <h5>EARRINGS</h5>
                    {{-- <p class="text-muted"><span>56</span> items</p> --}}
                </div>
            </div>
            <div class="col-lg-2 col-10 border border-dark-50 border-2 py-2">
                <div class="text-center py-4">
                    <img src="{{ asset('assets/frontend/images/product/Bracelet.svg') }}" alt=""
                        class="image-fluid">
                </div>

                <div class="text-center">
                    <h5>BRACELETS</h5>
                    {{-- <p class="text-muted"><span>56</span> items</p> --}}
                </div>
            </div>
            <div class="col-lg-2 col-10 border border-dark-50 border-2 py-2">
                <div class="text-center py-4">
                    <img src="{{ asset('assets/frontend/images/product/pendants.svg') }}" alt=""
                        class="image-fluid">
                </div>

                <div class="text-center">
                    <h5>PENDANTS</h5>
                    {{-- <p class="text-muted"><span>56</span> items</p> --}}
                </div>
            </div>
            <div class="col-lg-2 col-10 border border-dark-50 border-2 py-2">
                <div class="text-center py-4">
                    <img src="{{ asset('assets/frontend/images/product/watch.svg') }}" alt=""
                        class="image-fluid">
                </div>

                <div class="text-center">
                    <h5>WATCHES</h5>
                    {{-- <p class="text-muted"><span>56</span> items</p> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Shanti Jewelry Show -->
    <div class="my-5 py-5 px-0 mx-0 g-0">
        <div class="row m-0 p-0 showover justify-content-center align-items-center">
            <div class="col-md-3 col-12 p-0 d-none d-md-block">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti.png') }}" alt=""
                            class="shantisocial">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti3.png') }}" alt=""
                            class="shantisocial">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti2.png') }}" alt=""
                            class="shantisocial">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti.png') }}" alt=""
                            class="shantisocial">
                    </div>
                </div>
            </div>


            <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center">
                <h3 class="joinshanti text-center display-5 d-none d-lg-block">Join shanti.jewelry</h3>
                <h3 class="joinshanti text-center display-5 d-block d-lg-none">Join #do.jewelry</h3>

                <div class="my-5 text-center text-capitalize">
                    <a href="https://www.instagram.com/shantijewelry_gh?igsh=cWE5bnllMzV5bDNm"
                        class="text-decoration-none text-dark border border-2 border-dark-50 rounded-1 px-4 py-2 text-uppercase follow">Follow
                        us on instagram</a>
                </div>
            </div>
            <div class="col-md-3 col-12 p-0 d-none d-md-block">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti1.png') }}" alt=""
                            class="shantisocial">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti3.png') }}" alt=""
                            class="shantisocial">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti2.png') }}" alt=""
                            class="shantisocial">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('assets/frontend/images/joinshanti.png') }}" alt=""
                            class="shantisocial">
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-12 gap-0 d-md-none d-block">
                <div class="row w-100 m-0 p-0">
                    <div class="col-6 p-0">
                        <img src="{{ asset('assets/frontend/images/joinshanti.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-6 p-0">
                        <img src="{{ asset('assets/frontend/images/joinshanti3.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-6 p-0">
                        <img src="{{ asset('assets/frontend/images/joinshanti2.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-6 p-0">
                        <img src="{{ asset('assets/frontend/images/joinshanti.png') }}" alt="" class="w-100">
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
