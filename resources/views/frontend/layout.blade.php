<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer>
    </script>

    <!-- Owl Carousel -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js" defer></script>

    @yield('styles')

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/oldstyle.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/common-style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugin.min.css')}}">
    


    <link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon.css') }}">

              <!-- plugin css -->
              <link rel="stylesheet" href="{{asset('assets/frontend/css/plugin.min.css')}}">


    <!-- Javascript -->
    <script src="{{ asset('assets/frontend/js/main.js') }}" defer></script>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Favicon -->


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/frontend/favico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/favico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/frontend/favico/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/frontend/favico/safari-pinned-tab.svg') }}" color="#000000">
    <meta name="msapplication-TileColor" content="#dae0df">
    <meta name="theme-color" content="#ffffff">


    <title>Shanti Jewelry</title>

           {{-- Styles for Product details sizes --}}
           <style>

            .product-sizes {
                padding-top: 30px
            }
            .checkbox-alphanumeric::after,
            .checkbox-alphanumeric::before {
                content: '';
                display: table;
            }
    
            .checkbox-alphanumeric::after {
                clear: both;
            }
    
            .checkbox-alphanumeric input {
                left: -9999px;
                position: absolute;
            }
    
            .checkbox-alphanumeric label {
                width: 2.25rem;
                height: 2.25rem;
                float: left;
                padding: 0.375rem 0;
                margin-right: 0.375rem;
                display: block;
                color: #818a91;
                font-size: 0.875rem;
                font-weight: 400;
                text-align: center;
                background: transparent;
                text-transform: uppercase;
                border: 1px solid #e6e6e6;
                border-radius: 2px;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                transition: all 0.3s ease;
                transform: scale(0.95);
            }
    
            .checkbox-alphanumeric-circle label {
                border-radius: 100%;
            }
    
            .checkbox-alphanumeric label > img {
                max-width: 100%;
            }
    
            .checkbox-alphanumeric label:hover {
                cursor: pointer;
                border-color: #ff8000;
            }
    
            .checkbox-alphanumeric input:checked ~ label {
                transform: scale(1.1);
                border-color: red !important;
            }
    
            .checkbox-alphanumeric--style-1 label {
                width: auto;
                padding-left: 1rem;
                padding-right: 1rem;
                border-radius: 2px;
            }
    
            .d-table.checkbox-alphanumeric--style-1 {
                width: 100%;
            }
    
            .d-table.checkbox-alphanumeric--style-1 label {
                width: 100%;
            }
            </style>
    
</head>

<body>

  @includeIf('frontend.partials.navbar')

    @yield('content')
    <!-- Footer -->

    <footer class="py-4">
        <div class="container justify-content-center align-content-center">
            <ul
                class="list-unstyled text-dark d-md-flex d-flex flex-lg-row flex-column justify-content-center align-content-center text-center gap-4 mb-4 mb-lg-0 mt-4">
                <li class="px-5"><a href="" class="text-decoration-none text-dark">EXPLORE</a></li>
                <li class="px-5"><a href="" class="text-decoration-none text-dark">ABOUT US</a></li>
                <li><a href="" class="text-uppercase text-decoration-none text-dark">Shanti jewelry</a></li>
                <li class="px-5">
                    <div class="dropdown">
                        {{-- <button class="btn p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            EN
                            <span class="w-100">
                                <img src="asset('{{ asset('assets/frontend/images/arrow-down.svg') }}')" alt="">
                            </span>
                        </button> --}}
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Chinese</a></li>
                            <li><a class="dropdown-item" href="#">French</a></li>
                        </ul>
                    </div>
                </li>
            </ul>

            <ul class="list-unstyled text-muted d-flex justify-content-center align-content-center socials mt-5">
                <li class="px-4 px-lg-5"><a href="" class="text-decoration-none text-muted">FACEBOOK</a></li>
                <li class="px-4 px-lg-5"><a href="" class="text-decoration-none text-muted">INSTAGRAM</a></li>
                <li class="px-4 px-lg-5"><a href="" class="text-decoration-none text-muted">SNAPCHAT</a></li>
            </ul>
        </div>
    </footer>

    {{-- <div id="cartIconWrapper">
        <a class="d-block" id="cartIcon" href="{{ route('front.cart') }}">
            <div class="cart-length">
                <i class="fas fa-cart-plus"></i>
                <span class="length">{{ cartLength() }} {{ __('ITEMS') }}</span>
            </div>
            <div class="cart-total">
                {{ cartTotal() }}
            </div>
        </a>
    </div> --}}

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- popper js -->
    <script src="{{ asset('assets/user/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/user/js/bootstrap.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('assets/user/js/owl.carousel.min.js') }}"></script>
    <!-- slicknav js -->
    <script src="{{ asset('assets/user/js/jquery.slicknav.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ asset('assets/user/js/slick.min.js') }}"></script>
    <!-- isotope js -->
    <script src="{{ asset('assets/user/js/isotope.pkgd.min.js') }}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('assets/user/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- nice select js -->
    <script src="{{ asset('assets/user/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/user/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/lazyload.min.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('assets/admin/js/plugin/summernote/summernote-bs4.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset('assets/user/js/main.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        var imgupload = "{{ route('user.summernote.upload') }}";
    </script>

    <!-- custom js -->
    <script src="{{ asset('assets/user/js/custom.js') }}"></script>

    @yield('scripts')

    @if (session()->has('success'))
        <script>
            toastr["success"]("{{ __(session()->get('success')) }}");
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            toastr["error"]("{{ __(session('error')) }}");
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
</body>

</html>
