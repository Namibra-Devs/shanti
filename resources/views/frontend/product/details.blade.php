@extends('frontend.layout')

@section('content')
    <main role="main" class="container mt-4">
        <!-- Menu and Filter -->

        <div class="container">
            <div class="mt-5 pt-5">
                <p class="text-center text-muted header-ff d-none d-lg-block"><a href=""
                        class="text-decoration-none text-muted">Home</a> / <a href=""
                        class=" text-decoration-none text-muted">Rings</a> / <a href="#"
                        class="text-dark text-decoration-none">Wedding Rings</a></p>
            </div>

            <div class="ms-5 d-block d-lg-none">
                <a href="./rings.html" class="mb-4 text-decoration-none text-dark text-uppercase">
                    <img src="{{ asset('assets/frontend/images/back.svg') }}" alt="Back Button" />
                    Back</a>
                <h3 class="display-3 header-ff">{{ convertUtf8($product->title) }}</h3>
            </div>

            <div class="row my-5 justify-content-around">

                <div class="col-lg-5 col-11">
                    <img src="{{ asset('assets/frontend/images/product/ringbig.png') }}" alt=""
                        class="img-fluid w-100 mb-2">
                    <div class="d-flex gap-2">
                        <img src="{{ asset('assets/frontend/images/product/ringsmall.png') }}" alt=""
                            class="img-fluid w-100">
                        <img src="{{ asset('assets/frontend/images/product/ringsmall.png') }}" alt=""
                            class="img-fluid w-100">
                    </div>
                </div>
                <form action="{{ route('front.product.checkout', $product->slug) }}" class="col-lg-5 col-11">
                        <div class="d-none d-lg-block">
                            <a href="./rings.html" class="mb-4 text-decoration-none text-dark text-uppercase">
                                <img src="{{ asset('assets/frontend/images/back.svg') }}" alt="Back Button" />
                                Back</a>
                            <h3 class="display-3 header-ff">{{ convertUtf8($product->title) }}</h3>
                        </div>
                        <div class="gender-matrials mt-4 body-ff">
                            <p class="text-muted py-1 m-0"><img src="{{ asset('assets/frontend/images/material.svg') }}"
                                    alt="" class="me-1 p-0"> Material: Silver</p>
                            <p class="text-muted py-1 m-0"><img src="{{ asset('assets/frontend/images/gender.svg') }}"
                                    alt="" class="me-1 m-0"> Gender: <span>Unisex</span></p>
    
                            <p class="text-muted my-3">{!! replaceBaseUrl(convertUtf8($product->description)) !!}</p>
                        </div>
    
                        <div class="d-flex counter-size justify-content-between align-content-center">
                            <div class="">
                                <div class="btn-group text-muted">SIZE:
                                    <button type="button" class="btn p-0 ms-2 text-muted border-0" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        7.5 <img src="{{ asset('assets/frontend/images/arrow-down.svg') }}" alt=""
                                            class="ms-1">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">7</a></li>
                                        <li><a class="dropdown-item" href="#">6.5</a></li>
                                        <li><a class="dropdown-item" href="#">6</a></li>
                                        <li><a class="dropdown-item" href="#">5</a></li>
                                    </ul>
                                </div>
                                <div class="btn-group text-muted d-block mt-2">COLOUR:
                                    <button type="button" class="btn p-0 ms-2 text-muted border-0" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Silver <img src="{{ asset('assets/frontend/images/arrow-down.svg') }}" alt=""
                                            class="ms-1">
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">7</a></li>
                                        <li><a class="dropdown-item" href="#">6.5</a></li>
                                        <li><a class="dropdown-item" href="#">6</a></li>
                                        <li><a class="dropdown-item" href="#">5</a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <div class="counter">
                                <div
                                    class="d-flex justify-content-between align-content-center border border-2 border-black-50 px-1 py-2 rounded-1">
                                    <button type="button" class="btn p-0 px-2 border-0"><img
                                            src="{{ asset('assets/frontend/images/minus.svg') }}" alt=""></button>
                                    <div>
    
                                        <p class="m-0 px-2" id="counter">1</p>
                                    </div>
    
                                    <button type="button" class="btn p-0 px-2 border-0">
                                        <img src="{{ asset('assets/frontend/images/plus.svg') }}" alt=""
                                            class="m-0 p-0">
                                    </button>
                                </div>
    
    
                            </div>
    
                        </div>
                        <div class="d-flex justify-content-between align-content-center my-4">
                            <div class="prices">
                                <p class="m-0 fw-bold">₵ <span class="price">{{ $product->current_price }}</span></p>
                            </div>
    
                            <div class="stocks me-5 pe-md-3 p-0">
                                <p class="m-0 price text-muted">
                                    @if ($product->stock > 0)
                                        <span>In Stock: {{ $product->stock }} </span>
                                    @else
                                        <span>Out of Stock: {{ $product->stock }} </span>
                                    @endif
                                </p>
                            </div>
                        </div>
    
                        <div class="action-btns d-flex justify-content-between align-content-center">
    
                            <div class="">
                                <button type="submit" class="btn text-uppercase btn-dark px-4 px-md-5 border-2 buy">Buy now</button>
                            </div>
                            <div class="">
                                <a data-href="{{ route('add.cart', $product->id) }}"
                                    class="btn text-uppercase btn-light border border-dark-subtle border-2 px-5 addcart">Add
                                    to cart</a>
                            </div>
                            {{-- <div class="">
                                <button class="btn text-uppercase btn-light"><img src="./src/images/heart.svg"
                                        alt=""></button>
                            </div> --}}
                        </div>
    
                </form>

            </div>

        </div>

        <div class="related-items container my-5 py-5">
            <h4 class="header-ff my-3">Related Items</h4>
            <div class="row justify-content-center align-content-center">
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="item">
                                <img src="{{ asset('assets/frontend/images/Painting.png') }}" alt="image" class="w-100" />
                                <div class="mt-2 d-flex justify-content-between align-content-center my-2">
                                    <div>
                                        <a href="./productview.html" class="text-decoration-none text-dark">BUTTERFLY
                                            CLIP
                                            <p class="fw-bold"><span>₵</span>2,499</p>
                                        </a>
                                    </div>

                                    <div>
                                        <button class="btn"><img src="./src/images/heart.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="item">
                                <img src="./src/images/Painting.png" alt="image" class="w-100" />
                                <div class="mt-2 d-flex justify-content-between align-content-center my-2">
                                    <div>
                                        <a href="#" class="text-decoration-none text-dark">BUTTERFLY CLIP
                                            <p class="fw-bold"><span>₵</span>2,499</p>
                                        </a>
                                    </div>

                                    <div>
                                        <button class="btn"><img src="./src/images/heart.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="item">
                                <img src="./src/images/Painting.png" alt="image" class="w-100" />
                                <div class="mt-2 d-flex justify-content-between align-content-center my-2">
                                    <div>
                                        <a href="#" class="text-decoration-none text-dark">BUTTERFLY CLIP
                                            <p class="fw-bold"><span>₵</span>2,499</p>
                                        </a>
                                    </div>

                                    <div>
                                        <button class="btn"><img src="./src/images/heart.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="item">
                                <img src="./src/images/Painting.png" alt="image" class="w-100" />
                                <div class="mt-2 d-flex justify-content-between align-content-center my-2">
                                    <div>
                                        <a href="#" class="text-decoration-none text-dark">BUTTERFLY CLIP
                                            <p class="fw-bold"><span>₵</span>2,499</p>
                                        </a>
                                    </div>

                                    <div>
                                        <button class="btn"><img src="./src/images/heart.svg" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <script src="{{ asset('assets/frontend/js/cart.js') }}"></script>
    <script>
        $(document).on('click', '.review-value li a', function() {
            $('.review-value li a i').removeClass('text-primary');
            let reviewValue = $(this).attr('data-href');
            parentClass = `review-${reviewValue}`;
            $('.' + parentClass + ' li a i').addClass('text-primary');
            $('#reviewValue').val(reviewValue);
        })
    </script>
@endsection
