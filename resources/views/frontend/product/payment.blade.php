@extends('frontend.layout')

@section('content')
<main role="main" class="container mt-5">
  <!-- Menu and Filter -->

  <div class="container my-5 pt-5">
      <div class="d-flex justify-content-md-between justify-content-center align-items-center">
          <div class="ms-5">
              <a href="./shipping.html"
                  class="mb-lg-4 mb-0 text-decoration-none text-dark text-uppercase d-none d-md-block">
                  <img src="./src/images/back.svg" alt="Back Button" />
                  Back</a>
          </div>

          <div class="cart d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">1. Cart</button>
          </div>
          <div class="shipping d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">2. Shipping</button>
          </div>
          <div class="payment d-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase fw-bold">3. Payment</button>
          </div>
          <div class="summary d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">4. Summary</button>
          </div>
      </div>
  </div>
  <!-- Payment Form -->
  <form class="row g-3 needs-validation my-3 pb-5 border-bottom border-2 px-3 px-md-0" novalidate>
      <h5>Enter Payment Details</h5>

      <h5 class="mt-3 text-capitalize">Choose Payment Method</h5>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
              value="option1" checked>
          <label class="form-check-label w-100" for="exampleRadios1">Pay with Credit Card</label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
              value="option1" checked>
          <label class="form-check-label w-100" for="exampleRadios1">Pay upon Receipt</label>
      </div>

      <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
              value="option1" checked>
          <label class="form-check-label w-100" for="exampleRadios1">Pay with Momo</label>
      </div>

      </div>
      <div class="col-md-8 col-12">
          <label for="validationCustom01" class="form-label">Card Number<span
                  class="text-danger fw-bold">*</span></label>
          <input type="text" class="form-control" id="validationCustom01" placeholder="**** **** **** ****"
              required>
          <div class="valid-feedback">
              Looks good!
          </div>

      </div>

      <div class="col-md-4 col-12">
          <label for="validationCustom02" class="form-label">Expiry Date<span
                  class="text-danger fw-bold">*</span></label>
          <input type="text" class="form-control" id="validationCustom02" placeholder="MM/YY" required>
          <div class="valid-feedback">
              Looks good!
          </div>
      </div>

      <div class="col-md-4 col-12">
          <label for="validationCustom03" class="form-label">Security Code <span
                  class="text-danger fw-bold">*</span></label>
          <input type="text" placeholder="+233 54 325 2085" class="form-control" id="validationCustom03"
              required>
          <div class="invalid-feedback">
              Please provide a valid city.
          </div>
      </div>

      <div class="col-md-8 col-12">
          <label for="validationCustom03" class="form-label">Name on Card<span
                  class="text-danger fw-bold">*</span></label>
          <input type="text" placeholder="Full Name" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
              Please provide a valid city.
          </div>
      </div>
  </form>

  <div class="total d-flex justify-content-between px-4 mt-0 align-items-center my-4 pt-3">
      <h5 class="m-0 fw-light">Delivery</h5>
      <p class="delivery-price m-0"><span class="id="total"">Free</span></p>
  </div>

  <div class="total fw-bold d-flex justify-content-between px-4 mt-0 align-items-center">
      <h5 class="m-0 fw-light">Total</h5>
      <p class="total-price m-0">₵ <span class="id="total"">5000.00</span></p>
  </div>

  <div
      class="shipping-proceed d-flex flex-column flex-md-row gap-2 mt-4 justify-content-lg-end justify-content-center align-items-center mb-5">
      <div class="shippay">
          <a href="./shipping.html" class="btn px-5 text-uppercase border border-2 rounded-2 w-100">Back to
              Shipping</a>
      </div>
      <div class="shippay">
          <a href="./summary.html"
              class="btn px-5 bg-dark text-light text-uppercase border border-2 rounded-2 w-100">Order
              Summary</a>
      </div>

  </div>

</main>
@endsection