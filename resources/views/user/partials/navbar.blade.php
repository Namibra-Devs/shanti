<div class="header-navbar">
    <div class="row">
       <div class="col-lg-2 col-6">
          <div class="logo-wrapper">
             <a href="{{route('front.index')}}"><img class="lazy" data-src="{{asset('assets/frontend/images/logo.svg')}}" alt=""></a>
          </div>
       </div>
       <div class="col-lg-10 col-6 text-right position-static">
          <ul class="main-menu" id="mainMenu">
                         <li><a href="{{ route('front.index') }}">Home</a></li>
                         <li><a href="">Schedule</a></li>
                         <li><a href="{{route('front.product')}}">Product</a></li>
          </ul>
          <div id="mobileMenu"></div>
       </div>
    </div>
 </div>