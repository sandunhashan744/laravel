<!DOCTYPE html>
<html lang="en">

  <!--================Header Menu Area =================-->  
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Elegent Clothing</title>
 
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('css/flaticon.css')}}" />
  <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('vendors/lightbox/simpleLightbox.css')}}" />
  <link rel="stylesheet" href="{{asset('vendors/nice-select/css/nice-select.css')}}" />
  <link rel="stylesheet" href="{{asset('vendors/animate-css/animate.css')}}" />
  <link rel="stylesheet" href="{{asset('vendors/jquery-ui/jquery-ui.css')}}" />

  <!-- jquary -->
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

  <!-- main css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />

  <!-- Carosel -->
  <link rel="stylesheet" href="{{asset('css/homepage/owl.carousel.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/homepage/owl.theme.default.min.css')}}" />


  <style>
    .search-product{
      width: 300px;
      margin-right:80px;
      margin-bottom:0px;
      padding-top:23px;
    }
    .btn-search{
      width: 36px;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #71cd14;
      color: var(--light);
      font-size: 18px;
      border: none;
      outline: none;
      border-radius: 0 36px 36px 0;
      cursor: pointer;
    }
    .search-box{
        flex-grow: 1;
        height: 100%;
        background: var(--grey);
        border-radius: 36px 0 0 36px;
        width: 100%;
        color: var(--dark);
    }
  </style>
  
</head>

<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <!--<div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Phone: +37 545 6096</p>
              <p>email: elegent@clothing.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="cart.html">
                    gift card
                  </a>
                </li>
                <li>
                  <a href="tracking.html">
                    track order
                  </a>
                </li>
                <li>
                  <a href="contact.html">
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="/">
            <img src="{{asset('img/logo.png')}}" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">

                  <li class="nav-item  {{ (request()->is('/')) ? 'active' : '' }} ">
                    <a class="nav-link" href="\">Home</a>
                  </li>
                  <li class="nav-item {{ (request()->is('shop/1')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('shop',1)}}">Mens</a>
                  </li>
                  <li class="nav-item {{ (request()->is('shop/2')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('shop',2)}}">Women</a>
                  </li>
                  <li class="nav-item {{ (request()->is('shop/3')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('shop',3)}}">Kids</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                
                <!-- Authentication Links -->
                <li class="nav-item">
                    <div class="search-product">
                        <form action="{{ url('searchProduct') }}" method="post">
                          @csrf
                          <div class="input-group ">
                            <input type="search" id="search_product" name="sarchPro" required class="form-control form-control-sm search-box" placeholder="Search Products">
                            <button type="submit" class="input-group-text btn-search"><i class="fa fa-search "></i></button>
                          </div>
                        </form>
                    </div>
                  </li> 

                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                  <li class="nav-item ">
                    <a href="/cart" class="nav-link">
                      <i class="ti-shopping-cart"></i>
                      <span class="badge badge-pill bg-success cart-count" style="color:#fff; font-size:13px;">0</span>
                    </a>
                  </li> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
<!-- ******************************************************************* -->
              @guest
              @if (Route::has('login'))    
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">
                      <i class="fa-solid fa-user"></i> {{ __('Login') }}</a>
                  </li>
              @endif
                <!--
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
              -->    
              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fa-solid fa-user-check"></i>  {{ Auth::user()->name }}
                  </a>
                  
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      
                      <a class="dropdown-item" href="{{  url('my-orders') }}">
                          <i class="fa-solid fa-clipboard-list"></i>  {{ __('  My Orders') }}
                      </a>

                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>

                </li>
              @endguest

  <!--**********************************************************************-->
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  @yield('content')

  @if(session('status'))
    <script>
      swal("{{session('status')}}");
    </script>
	@endif
  
 <!--================ start footer Area  =================-->
 <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>
            <li><a href="#">Manage Reputation</a></li>
            <li><a href="#">Power Tools</a></li>
            <li><a href="#">Marketing Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>
            <li><a href="#">Brand Assets</a></li>
            <li><a href="#">Investor Relations</a></li>
            <li><a href="#">Terms of Service</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Research</a></li>
            <li><a href="#">Experts</a></li>
            <li><a href="#">Agencies</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>You can trust us. we only send promo offers,</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Subscribe</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-dribbble"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->

  <!-- Custom Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/homepage/custom.js') }}" defer></script>

  <!-- ***************** Owl Carosel ******************* -->
  <script src="{{ asset('js/homepage/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/homepage/owl.carousel.min.js') }}"></script>
  

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/stellar.js') }}"></script>
  <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
  <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
  <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
  <script src="{{ asset('js/mail-script.js') }}"></script>
  <script src="{{ asset('js/theme.js') }}"></script>

  <!-- Icone Font awesome -->
  <script src="https://kit.fontawesome.com/9778c4863d.js" crossorigin="anonymous"></script>
  
	<!-- Sweet Alerts-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Autocomplete -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <script>

    var availableTags = [];
    $.ajax({
      method: "GET",
      url: "/product-list",
      success: function (response){
        //console.log(response);
        autocompletePro(response);
      }
    });
   
    function autocompletePro(availableTags){ 
      $( "#search_product" ).autocomplete({
        source: availableTags
      });
    }
  </script>
  
</body>

</html>