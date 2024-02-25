@extends('frontend.layout')

@section('content')
    <main role="main" class="container mt-5">
        <!-- Menu and Filter -->

        <div class="container my-5 pt-5">

            <!-- Cart Menu -->
            <div class="d-flex justify-content-md-between justify-content-center align-items-center">
                <div class="ms-5">
                    <a href="./productview.html"
                        class="mb-lg-4 mb-0 text-decoration-none text-dark text-uppercase d-none d-md-block">
                        <img src="{{ asset('assets/frontend/images/back.svg') }}" alt="Back Button" />
                        Back</a>
                </div>

                <div class="cart">
                    <button class="btn border-0 header-ff fs-5 text-uppercase fw-bold">1. Cart</button>
                </div>
                <div class="shipping d-none d-md-block">
                    <button class="btn border-0 header-ff fs-5 text-uppercase">2. Shipping</button>
                </div>
                <div class="payment d-none d-md-block">
                    <button class="btn border-0 header-ff fs-5 text-uppercase">3. Payment</button>
                </div>
                <div class="summary d-none d-md-block">
                    <button class="btn border-0 header-ff fs-5 text-uppercase">4. Summary</button>
                </div>
            </div>

            @if ($cart != null)
                @foreach ($cart as $id => $item)
                    @php
                        $product = App\Product::findOrFail($id);
                    @endphp

                    <div
                        class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100">
                        <div
                            class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4 w-100">
                            <img src="./src/images/Painting2.png" alt="" class="cart-img">
                            <div class="w-100">
                                <a href="{{ route('front.product.details', $product->slug) }}">
                                    <h5 class="my-4">{{ convertUtf8($item['name']) }}</h5>
                                </a>
                                <p class="text-uppercase text-muted m-0">Size: <span
                                        id="size">{{ $item['size'] }}</span></p>
                                <p class="text-uppercase text-muted m-0">Colour: <span id="color"
                                        class="text-capitalize">Silver</span></p>
                            </div>

                        </div>

                        <div class="price-edit">
                            <p class="my-4 fw-bold text-start">₵ <span class="price">{{ $item['price'] }}</span></p>
                            <div class="mt-md-5 pt-mf-5">


                                <div
                                    class="counter mt-4 d-flex gap-5 justify-content-between align-items-center w-100 gap-5 pt-md-5">
                                    <div class="edit-deletebtns d-flex">
                                        <button class="btn border-0 text-muted">
                                            <img src="{{ asset('assets/frontend/images/edit.svg') }}" alt="">
                                            <span>Edit</span>
                                        </button>
                                        <button class="btn border-0 text-muted">
                                            <img src="{{ asset('assets/frontend/images/delete.svg') }}" alt=""
                                                class="">
                                            <span>{{ route('cart.item.remove', $id) }}</span>
                                        </button>
                                    </div>

                                    <!-- Counter -->
                                    <div class="product-quantity d-flex mb-35" id="quantity">
                                        <button type="button" id="sub" class="sub">-</button>
                                        <input type="text" class="cart_qty" id="1" value="{{ $item['qty'] }}" />
                                        <button type="button" id="add" class="add">+</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="bg-light py-5 text-center">
                    <h3 class="text-uppercase">{{ __('Cart is empty!') }}</h3>
                </div>
            @endif

            <!-- Cart Item -->

            <!-- Total -->
            <div class="total fw-bold d-flex justify-content-between px-4 mt-0 align-items-center">
                <h5 class="m-0 fw-light">Total</h5>
                @if ($cart != null)
                    @php
                        $cartTotal = 0;
                        $countitem = 0;
                        if ($cart) {
                            foreach ($cart as $p) {
                                $cartTotal += $p['price'] * $p['qty'];
                                $countitem += $p['qty'];
                            }
                        }
                    @endphp
                    <p class="total-price m-0">₵ <span class="id="total"">{{ $cartTotal }}</span></p>
                @endif
            </div>

            <div
                class="shipping-proceed d-flex flex-column flex-md-row gap-2 mt-4 justify-content-lg-end justify-content-center align-items-center">
                <div class="shippay">
                    <a href="{{ route('front.product') }}"
                        class="btn px-5 text-uppercase border border-2 rounded-2 w-100">Back
                        to Collections</a>
                </div>
                <div class="shippay">
                    <a href="{{ route('front.checkout') }}"
                        class="btn px-5 bg-dark text-light text-uppercase border border-2 rounded-2 w-100">PROCEED TO
                        Shipping</a>
                </div>

            </div>
        </div>

    </main>
@endsection
