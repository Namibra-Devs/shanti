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
          <div class="payment d-none d-md-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase">3. Payment</button>
          </div>
          <div class="summary d-block">
              <button class="btn border-0 header-ff fs-5 text-uppercase fw-bold">4. Summary</button>
          </div>
      </div>
  </div>


  <!-- Ordered Item Summary -->
  <div
      class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100">
      <div
          class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4 w-100">
          <img src="./src/images/Painting2.png" alt="" class="cart-img">
          <div class="w-100 px-4 px-md-0">
              <h5 class="mt-4">BUTTERFLY CLIP</h5>
              <p class="mb-5 fw-bold text-start">₵ <span>2,499.00</span></p>
              <p class="text-uppercase text-muted m-0">Size: <span id="size">6.5</span></p>
              <p class="text-uppercase text-muted m-0">Colour: <span id="color"
                      class="text-capitalize">Silver</span></p>
              <p class="text-uppercase text-muted m-0">Number of Items: <span id="order-pcs"
                      class="text-capitalize">2</span></p>
          </div>

      </div>
  </div>
  </div>

  <!-- Personal Details -->
  <div class="order-details px-4 px-md-0">
      <h5>A. Personal Details</h5>
      <div class="personal-details w-100 row">
          <div class="d-flex justify-content-around flex-column flex-md-row col-md-4 col-12 w-100">
              <div class="my-lg-2 mt-md-3 w-100">
                  <p class="text-muted m-0">First Name</p>
                  <p class="fw-bold">Asamoah</p>
              </div>
              <div class="my-2 mt-3 w-100">
                  <p class="text-muted m-0">Last Name</p>
                  <p class="fw-bold">John</p>
              </div>
          </div>
      </div>
      <div class="personal-details w-100 row">
          <div class="d-flex justify-content-around flex-column flex-md-row col-md-4 col-12 w-100">
              <div class="my-2 mt-3 w-100">
                  <p class="text-muted m-0">Phone Number</p>
                  <p class="fw-bold">Asamoah</p>
              </div>
              <div class="my-2 mt-3 w-100">
                  <p class="text-muted m-0">Email</p>
                  <p class="fw-bold">Asamoahjohn@gmail.com</p>
              </div>
          </div>
      </div>
  </div>

  <!-- Order Details -->
  <div class="order-details mt-4 border-bottom border-2">
      <h5>B. Shipping Details</h5>
      <div class="mt-4">
          <h6>Delivery Details</h6>
          <div class="my-3 border border-2 bg-dark-50 rounded-2 p-3 col-lg-4 col-md-8 mb-3">
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                      value="option1" checked>
                  <label class="form-check-label w-100" for="exampleRadios1">
                      <div class="d-flex justify-content-between align-items-center g-3">
                          <div class="mx-2">
                              <span class="deliver-type d-block text-muted">Standard Delivery</span>
                              <span class="deliver-date d-block text-muted">Arrives by Wed 10/26 - Fri
                                  10/28</span>
                          </div>
                          <div>
                              <span class="fw-bold" id="delivery-cost">Free</span>
                          </div>
                      </div>
                  </label>
              </div>
          </div>
      </div>

      <!-- Address -->
      <div class="address pt-3 my-3">
          <h6 class="text-muted">Address</h6>
          <p class="fw-bold">Road 5, Asamoah Road, Accra, Ghana</p>
          <div class="d-flex justify-content-between col-md-3 col-8">
              <div>
                  <h6 class="text-muted">City</h6>
                  <p class="fw-bold">Accra</p>
              </div>
              <div>
                  <h6 class="text-muted">Zip Code</h6>
                  <p class="fw-bold">23456</p>
              </div>
          </div>
      </div>
  </div>

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
          <a href="./payment.html" class="btn px-5 text-uppercase border border-2 rounded-2 w-100">Back to
              Payment</a>
      </div>
      <div class="shippay">
          <button type="button"
              class="btn px-5 bg-dark text-light text-uppercase border border-2 rounded-2 w-100"
              data-bs-toggle="modal" data-bs-target="#exampleModal">Place Order</button>
      </div>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header border-0">
                  <h5 class="modal-title" id="exampleModalLabel">Congratulation! Order Placed</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                      aria-label="Close"></button>
              </div>
              <div class="modal-body text-center">
                  <img src="./src/images/party-horn.svg" alt="" class="w-50 heartbeat">

              </div>
              <div class="modal-footer border-0">
                  <a href="./orders.html" type="button" class="btn btn-dark">Go to Orders</a>
                  <a href="./collections.html" type="button" class="btn btn-primary">Back to Collections</a>
              </div>
          </div>
      </div>
  </div>


</main>
@endsection