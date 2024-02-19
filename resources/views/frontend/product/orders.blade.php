@extends('frontend.layout')

@section('content')
<main role="main" class="container mt-5">
  <!-- Menu and Filter -->

  <div class="container my-5 pt-5">


      <!-- Ordered Item -->
      <div
          class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100">
          <div
              class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4">
              <img src="./src/images/Painting2.png" alt="" class="cart-img">
              <div class="w-100">
                  <h5 class="my-4">BUTTERFLY CLIP</h5>
                  <p class="text-uppercase text-muted m-0">Size: <span id="size">6.5</span></p>
                  <p class="text-uppercase text-muted m-0">Colour: <span id="color"
                          class="text-capitalize">Silver</span></p>
              </div>

          </div>
          <div class="price-edit ">
              <p class="my-4 fw-bold text-start">₵ <span class="price">2,499.00</span></p>
              <p class="order-placed text-muted px-3 py-1 rounded-2 text-center col-5 col-md-12">Order Placed</p>
          </div>
      </div>

      <!-- Ordered Item -->
      <div
          class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100">
          <div
              class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4">
              <img src="./src/images/Painting2.png" alt="" class="cart-img">
              <div class="w-100">
                  <h5 class="my-4">BUTTERFLY CLIP</h5>
                  <p class="text-uppercase text-muted m-0">Size: <span id="size">6.5</span></p>
                  <p class="text-uppercase text-muted m-0">Colour: <span id="color"
                          class="text-capitalize">Silver</span></p>
              </div>

          </div>
          <div class="price-edit ">
              <p class="my-4 fw-bold text-start">₵ <span class="price">2,499.00</span></p>
              <p class="order-shipped text-muted px-3 py-1 rounded-2 text-center col-5 col-md-12">Order Shipped
              </p>
          </div>

      </div>
      <!-- Ordered Item -->
      <div
          class="d-flex flex-column flex-md-row justify-content-md-between justify-content-center align-items-lg-sart my-5 w-100">
          <div
              class="item d-flex justify-content-md-between justify-content-center align-items-center align-items-md-start flex-column flex-md-row gap-4">
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
              <p class="order-delivered text-muted px-3 py-1 rounded-2 text-center col-5 col-md-12">Order
                  Delivered</p>
          </div>

      </div>


  </div>

</main>
@endsection