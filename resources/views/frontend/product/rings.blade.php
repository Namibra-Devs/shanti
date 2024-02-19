@extends('frontend.layout')

@section('content')
<main role="main" class="container mt-4">
  <!-- Menu and Filter -->


  <!-- Featured Products -->
  <div class="container my-5 pt-lg-5">
      <div class="mt-5 pt-5">
          <p class="text-center text-muted header-ff d-none d-lg-block"><a href=""
                  class="text-decoration-none text-muted">Home</a> / <a href=""
                  class=" text-decoration-none text-muted">Categories</a> / <a href="#"
                  class="text-dark text-decoration-none">Rings</a></p>
          <h2 class="text-center header">Rings</h2>

          <div class="container my-5">

              <nav class="py-2 navbar-expand-lg bg-white border border-2 border-black border-lg-0 rounded-1">
                  <div class="container-fluid">
                      <button
                          class="navbar-toggler border-0 w-100 rounded-1 text-uppercase text-center align-content-center"
                          type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent1"
                          aria-controls="navbarSupportedContent1" aria-expanded="false"
                          aria-label="Toggle navigation">Filter <span class="w-100 ms-2"><img
                                  src="./src/images/filter.svg" alt=""></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2 mt-4 mt-lg-0 text-center">

                              <li class="nav-item dropdown">
                                  <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                      data-bs-toggle="dropdown" aria-expanded="false">
                                      ALL MATERIALS <img src="./src/images/arrow-down.svg" alt="">
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li>
                                          <hr class="dropdown-divider">
                                      </li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  </ul>
                              </li>

                              <li class="nav-item dropdown">
                                  <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                      data-bs-toggle="dropdown" aria-expanded="false">
                                      ANY GENDER <img src="./src/images/arrow-down.svg" alt="">
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li>
                                          <hr class="dropdown-divider">
                                      </li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  </ul>
                              </li>

                              <li class="nav-item dropdown">
                                  <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                      data-bs-toggle="dropdown" aria-expanded="false">
                                      IN STOCK <img src="./src/images/arrow-down.svg" alt="">
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li>
                                          <hr class="dropdown-divider">
                                      </li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  </ul>
                              </li>

                              <li class="nav-item dropdown">
                                  <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                      data-bs-toggle="dropdown" aria-expanded="false">
                                      ANY TYPE <img src="./src/images/arrow-down.svg" alt="">
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li>
                                          <hr class="dropdown-divider">
                                      </li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  </ul>
                              </li>

                              <li class="nav-item dropdown">
                                  <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                      data-bs-toggle="dropdown" aria-expanded="false">
                                      PRICE <img src="./src/images/arrow-down.svg" alt="">
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li>
                                          <hr class="dropdown-divider">
                                      </li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  </ul>
                              </li>

                              <li class="nav-item">
                                  <button class="btn mx-2 px-3 border border-1 border-black-50">Clear</button>
                              </li>
                          </ul>
                          <form class="d-flex justify-content-center align-content-between">
                              <div class="border d-flex rounded-1">
                                  <input class="form-control border-0" type="search" placeholder="Search"
                                      aria-label="Search">
                                  <button class="btn" type="submit">
                                      <img src="./src/images/search.svg" alt="">
                                  </button>
                              </div>
                          </form>
                      </div>
                  </div>
              </nav>
          </div>
      </div>

      <!-- For Small Screens -->
      <div class="row justify-content-center align-content-center">
          <div class="col-lg-3 col-md-4 col-6">
              <div class="card border-0">
                  <div class="card-body">
                      <div class="item">
                          <img src="./src/images/Painting.png" alt="image" class="w-100" />
                          <div class="mt-2 d-flex justify-content-between align-content-center my-2">
                              <div>
                                  <a href="./productview.html" class="text-decoration-none text-dark">BUTTERFLY
                                      CLIP
                                      <p class="fw-bold"><span>₵</span>2,499</p>
                                  </a>
                              </div>

                              <div>
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
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
                                  <button class="btn"><img src="./src/images/heart.svg"
                                          alt=""></button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="text-center w-100">
          <a href="" class="btn border border-2 border-dark-50 px-5 follow">See More</a>
      </div>
  </div>

</main>
@endsection