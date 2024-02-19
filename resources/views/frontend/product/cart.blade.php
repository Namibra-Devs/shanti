@extends('frontend.layout')

@section()
    <main role="main" class="container mt-5">
        <!-- Menu and Filter -->

        <div class="container my-5 pt-5">

            <!-- Cart Menu -->
            <div class="d-flex justify-content-md-between justify-content-center align-items-center">
                <div class="ms-5">
                    <a href="./productview.html"
                        class="mb-lg-4 mb-0 text-decoration-none text-dark text-uppercase d-none d-md-block">
                        <img src="./src/images/back.svg" alt="Back Button" />
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

            <!-- Cart Item -->
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100">
                <div
                    class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4 w-100">
                    <img src="./src/images/Painting2.png" alt="" class="cart-img">
                    <div class="w-100">
                        <h5 class="my-4">BUTTERFLY CLIP</h5>
                        <p class="text-uppercase text-muted m-0">Size: <span id="size">6.5</span></p>
                        <p class="text-uppercase text-muted m-0">Colour: <span id="color"
                                class="text-capitalize">Silver</span></p>
                    </div>

                </div>

                <div class="price-edit">
                    <p class="my-4 fw-bold text-start">₵ <span class="price">2,499.00</span></p>
                    <div class="mt-md-5 pt-mf-5">


                        <div
                            class="counter mt-4 d-flex gap-5 justify-content-between align-items-center w-100 gap-5 pt-md-5">
                            <div class="edit-deletebtns d-flex">
                                <button class="btn border-0 text-muted">
                                    <img src="./src/images/edit.svg" alt="">
                                    <span>Edit</span>
                                </button>
                                <button class="btn border-0 text-muted">
                                    <img src="./src/images/delete.svg" alt="" class="">
                                    <span>Delete</span>
                                </button>
                            </div>

                            <!-- Counter -->
                            <div
                                class="counters d-flex justify-content-between align-content-center border border-2 border-black-50 px-1 py-2 rounded-1">
                                <button type="button" class="btn p-0 px-2 border-0" id="decrease"><img
                                        src="./src/images/minus.svg" alt=""></button>
                                <div>

                                    <p class="m-0 px-2" id="count">1</p>
                                </div>

                                <button type="button" class="btn p-0 px-2 border-0" id="increase">
                                    <img src="./src/images/plus.svg" alt="" class="m-0 p-0">
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Item -->
            <div
                class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100 border-bottom pb-5 border-2 ">
                <div
                    class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4 w-100">
                    <img src="./src/images/Painting2.png" alt="" class="cart-img">
                    <div class="w-100">
                        <h5 class="my-4">BUTTERFLY CLIP</h5>
                        <p class="text-uppercase text-muted m-0">Size: <span id="size">6.5</span></p>
                        <p class="text-uppercase text-muted m-0">Colour: <span id="color"
                                class="text-capitalize">Silver</span></p>
                    </div>

                </div>

                <div class="price-edit">
                    <p class="my-4 fw-bold text-start">₵ <span>2,499.00</span></p>
                    <div class="mt-md-5 pt-mf-5">


                        <div
                            class="counter mt-4 d-flex gap-5 justify-content-between align-items-center w-100 gap-5 pt-md-5">
                            <div class="edit-deletebtns d-flex">
                                <button class="btn border-0 text-muted">
                                    <img src="./src/images/edit.svg" alt="">
                                    <span>Edit</span>
                                </button>
                                <button class="btn border-0 text-muted">
                                    <img src="./src/images/delete.svg" alt="" class="">
                                    <span>Delete</span>
                                </button>
                            </div>

                            <!-- Counter -->
                            <div
                                class="counters d-flex justify-content-between align-content-center border border-2 border-black-50 px-1 py-2 rounded-1">
                                <button type="button" class="btn p-0 px-2 border-0" id="decrease1"><img
                                        src="./src/images/minus.svg" alt=""></button>
                                <div>

                                    <p class="m-0 px-2" id="count1">1</p>
                                </div>

                                <button type="button" class="btn p-0 px-2 border-0" id="increase1">
                                    <img src="./src/images/plus.svg" alt="" class="m-0 p-0">
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Total -->
            <div class="total fw-bold d-flex justify-content-between px-4 mt-0 align-items-center">
                <h5 class="m-0 fw-light">Total</h5>
                <p class="total-price m-0">₵ <span class="id="total"">5000</span></p>
            </div>

            <div
                class="shipping-proceed d-flex flex-column flex-md-row gap-2 mt-4 justify-content-lg-end justify-content-center align-items-center">
                <div class="shippay">
                    <a href="./collections.html" class="btn px-5 text-uppercase border border-2 rounded-2 w-100">Back
                        to Collections</a>
                </div>
                <div class="shippay">
                    <a href="./shipping.html"
                        class="btn px-5 bg-dark text-light text-uppercase border border-2 rounded-2 w-100">PROCEED TO
                        Shipping</a>
                </div>

            </div>
        </div>

    </main>
@endsection
