@extends('frontend.layout')

@section('content')
<main role="main" class="container mt-5">
  <!-- Menu and Filter -->

  <div class="container my-5 pt-5">
      <div class="d-flex justify-content-md-between justify-content-center align-items-center">
          <div class="ms-5">
              <a href="./cart.html"
                  class="mb-lg-4 mb-0 text-decoration-none text-dark text-uppercase d-none d-md-block">
                  <img src="./src/images/back.svg" alt="Back Button" />
                  Back</a>
          </div>

          <div class="cart d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">1. Cart</button>
          </div>
          <div class="shipping d-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase fw-bold">2. Shipping</button>
          </div>
          <div class="payment d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">3. Payment</button>
          </div>
          <div class="summary d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">4. Summary</button>
          </div>
      </div>

      <form class="row g-3 needs-validation my-3 pb-5 border-bottom border-2" novalidate>
          <h5>A. Enter Personal Details</h5>
          <div class="col-md-6 col-12">
              <label for="validationCustom01" class="form-label">First name<span
                      class="text-danger fw-bold">*</span></label>
                      @php
                                            $sfname = '';
                                            if (empty(old())) {
                                                if (Auth::check()) {
                                                    $sfname = Auth::user()->shpping_fname;
                                                }
                                            } else {
                                                $sfname = old('shpping_fname');
                                            }
                                        @endphp
              <input type="text" class="form-control" id="validationCustom01" placeholder="John" required value="{{ $sfname }}"">
              <div class="valid-feedback">
                  Looks good!
              </div>
          </div>
          <div class="col-md-6 col-12">
              <label for="validationCustom02" class="form-label">Last name<span
                      class="text-danger fw-bold">*</span></label>
                      @php
                                            $slname = '';
                                            if (empty(old())) {
                                                if (Auth::check()) {
                                                    $slname = Auth::user()->shpping_lname;
                                                }
                                            } else {
                                                $slname = old('shpping_lname');
                                            }
                                        @endphp
              <input type="text" class="form-control" id="validationCustom02" placeholder="Doe" required value="{{ $slname }}">
              <div class="valid-feedback">
                  Looks good!
              </div>
          </div>

          <div class="col-md-6 col-12">
              <label for="validationCustom03" class="form-label">Phone Number<span
                      class="text-danger fw-bold">*</span></label>
                      @php
                                            $snumber = '';
                                            if (empty(old())) {
                                                if (Auth::check()) {
                                                    $snumber = Auth::user()->shpping_number;
                                                }
                                            } else {
                                                $snumber = old('shpping_number');
                                            }
                                        @endphp
              <input type="text" placeholder="+233 20 000 0000" class="form-control"
                  id="validationCustom03" required value="{{ $snumber }}">
              <div class="invalid-feedback">
                  Please provide a valid city.
              </div>
          </div>
          <div class="col-md-6 col-12">
              <label for="validationCustom03" class="form-label">Email Address<span
                      class="text-danger fw-bold">*</span></label>
                      @php
                                            $smail = '';
                                            if (empty(old())) {
                                                if (Auth::check()) {
                                                    $smail = Auth::user()->shpping_email;
                                                }
                                            } else {
                                                $smail = old('shpping_email');
                                            }
                                        @endphp
              <input type="email" placeholder="username@email.com" class="form-control"
                  id="validationCustom03" required value="{{ $semail }}">
              <div class="invalid-feedback">
                  Please provide a valid city.
              </div>
          </div>

          <h5 class="mt-5">B. Enter Shipping Details</h5>
          <div class="delivery row gap-3">
              <div class="border border-2 bg-dark-50 rounded-2 p-3 col-lg-6 col-md-12 mb-3">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                          value="option1" checked>
                      <label class="form-check-label w-100" for="exampleRadios1">
                          <div class="d-flex justify-content-between align-items-center g-3">
                              <div class="mx-2">
                                  <span class="deliver-type d-block text-muted">Standard Delivery</span>
                                  {{-- <span class="deliver-date d-block text-muted">Arrives by Wed 10/26 - Fri
                                      10/28</span> --}}
                              </div>
                              <div>
                                  <span class="fw-bold" id="delivery-cost">Free</span>
                              </div>
                          </div>
                      </label>
                  </div>
              </div>

              <div class="bg-dark-50 rounded-2 p-3 col-lg-6 col-md-12 bg-light">
                  <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                          value="option2">
                      <label class="form-check-label w-100" for="exampleRadios2">
                          <div class="d-flex justify-content-between align-items-center g-3">
                              <div class="ms-2">
                                  <span class="deliver-type d-block text-muted">Express Delivery</span>
                                  <span class="deliver-date d-block text-muted">Arrives by Wed 10/15 - Fri
                                      10/20</span>
                              </div>
                              <div class="fw-bold">
                                  ₵<span class="fw-bold" id="delivery-cost"> 199.00</span>
                              </div>
                          </div>
                      </label>
                  </div>

              </div>
          </div>

          <div class="col-12">
              <label for="validationCustom03" class="form-label">Address<span
                      class="text-danger fw-bold">*</span></label>
                      @php
                                            $saddress = '';
                                            if (empty(old())) {
                                                if (Auth::check()) {
                                                    $saddress = Auth::user()->shpping_address;
                                                }
                                            } else {
                                                $saddress = old('shpping_address');
                                            }
                                        @endphp
              <input type="text" placeholder="125 Main St." class="form-control" id="validationCustom03"
                  required value="{{ $saddress }}">
              <div class="invalid-feedback">
                  Please provide a valid city.
              </div>
          </div>
          <div class="col-md-8 col-12">
              <label for="validationCustom03" class="form-label">City<span
                      class="text-danger fw-bold">*</span></label>
                      @php
                                            $scity = '';
                                            if (empty(old())) {
                                                if (Auth::check()) {
                                                    $scity = Auth::user()->shpping_city;
                                                }
                                            } else {
                                                $scity = old('shpping_city');
                                            }
                                        @endphp
              <input type="text" placeholder="Tamale" class="form-control" id="validationCustom03"
                  required value="{{ $scity }}">
              <div class="invalid-feedback">
                  Please provide a valid city.
              </div>
          </div>
          <div class="col-md-4 col-12">
              <label for="validationCustom03" class="form-label">Zip Code<span
                      class="text-danger fw-bold">*</span></label>
              <input type="text" placeholder="00233" class="form-control" id="validationCustom03" required>
              <div class="invalid-feedback">
                  Please provide a valid city.
              </div>
          </div>
      </form>

      <div class="total d-flex justify-content-between px-4 mt-0 align-items-center my-4 pt-3">
          <h5 class="m-0 fw-light">Delivery</h5>
          <p class="delivery-price m-0"><span class=" " id="total"">Free</span></p>
      </div>
      <div class="total fw-bold d-flex justify-content-between px-4 mt-0 align-items-center">
          <h5 class="m-0 fw-light">Total</h5>
          <p class="total-price m-0">₵ <span class="id="total"">5000</span></p>
      </div>

      <div
          class="shipping-proceed d-flex flex-column flex-md-row gap-2 mt-4 justify-content-lg-end justify-content-center align-items-center">
          <div class="shippay">
              <a href="./cart.html" class="btn px-5 text-uppercase border border-2 rounded-2 w-100">Back to
                  Cart</a>
          </div>
          <div class="shippay">
              <a href="./payment.html"
                  class="btn px-5 bg-dark text-light text-uppercase border border-2 rounded-2 w-100">PROCEED TO
                  Payment</a>
          </div>

      </div>

  </div>

</main>
@endsection