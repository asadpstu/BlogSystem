<!doctype html>
<html lang="en">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <meta charset="utf-8">
  <title>ABC Company Pte.</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('img-theme/favicon.png')}}" rel="icon">
  <link href="{{ asset('img-theme/apple-touch-icon.png')}}" rel="apple-touch-icon">



  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib-theme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib-theme/nivo-slider/css/nivo-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('lib-theme/owlcarousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('lib-theme/owlcarousel/owl.transitions.css') }}" rel="stylesheet">
  <link href="{{ asset('lib-theme/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib-theme/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib-theme/venobox/venobox.css') }}" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="{{ asset('css-theme/nivo-slider-theme.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css-theme/style.css') }}" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="{{ asset('css-theme/responsive.css') }}" rel="stylesheet">

        <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">



</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default" >
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="/" style="margin-top: 15px;color:white">
                  <span >ABC Company Pte.</span>
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">


            @if (Route::has('login'))
                
                  @auth
<!--                     <li class="active">
                       <a class="page-scroll" href="{{ url('/') }}">Home</a>
                    </li> -->
                    <li class="active">
                       <a class="page-scroll" href="{{ url('/home') }}">Dashboard</a>
                    </li>
                      @if(Auth::user()->register_as == 'Salesman')
                        <li class="active">                      
                          <a class="page-scroll" href="{{ url('/api') }}">Api Dashboard</a>
                        </li>
                      @endif
                    @else
                    <li class="active">
                       <a class="page-scroll" href="{{ route('login') }}">Login</a>
                    </li>

                    @if (Route::has('register'))
                    <li class="active">
                       <a class="page-scroll" href="{{ route('register') }}">Registrer</a>
                    </li>
                    @endif
                  @endauth
                
            @endif

                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="{{ asset('img-theme/slider/slider1.jpg') }}" alt="" title="#slider-direction-1" />
        <img src="{{ asset('img-theme/slider/slider2.jpg') }}" alt="" title="#slider-direction-2" />
        <img src="{{ asset('img-theme/slider/slider3.jpg') }}" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h3 class="title1" style="color:white"></h3>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h3 class="title1" style="color:white">Full Stack Engineer</h3>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h3 class="title1" style="color:white"></h3>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h3 class="title1" style="color:white">Front End Design</h3>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h3 class="title1" style="color:white"></h3>
                </div>
                <!-- layer 2 -->
                <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                  <h3 class="title1" style="color:white">Backend and Api Developement</h3>
                </div>
                <!-- layer 3 -->
                <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                  <a class="ready-btn page-scroll" href="#about">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->






  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <strong>Abc Company Pte.</strong>
                </div>

                <p>ABC company wants to create a simple blogging application to enable fun interaction/connection between their salesman and customers.This would provide enable them to have good relationship with their customers and might result in an increase in revenue over the long run.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <strong>Information</strong>
                <p>
                  Develop the simple blogging application
                </p>
                <div class="footer-contacts">
                  <p><span>Task 1. </span>Problem Understanding</p>
                  <p><span>Task 2. </span>Project raw Sketch</p>
                  <p><span>Task 3. </span>Database Design</p>
                  <p><span>Task 4. </span>Front Design</p>
                  <p><span>Task 5. </span>Backend Developemnt</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <strong>Gallery</strong>
                <div class="flicker-img">
                  <a href="#"><img src="{{ asset('images/ezgif.com-video-to-gif.gif')}}" alt=""></a>
                  <a href="#"><img src="{{ asset('images/commonfollower.gif')}}" alt=""></a>
                  <a href="#"><img src="{{ asset('images/3rd.gif')}}" alt=""></a>
                  <a href="#"><img src="{{ asset('images/4th.gif')}}" alt=""></a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; <strong>Abc Company Pte.</strong>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib-theme/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib-theme/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('lib-theme/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('lib-theme/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('lib-theme/knob/jquery.knob.js') }}"></script>
  <script src="{{ asset('lib-theme/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib-theme/parallax/parallax.js') }}"></script>
  <script src="{{ asset('lib-theme/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib-theme/nivo-slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
  <script src="{{ asset('lib-theme/appear/jquery.appear.js') }}"></script>
  <script src="{{ asset('lib-theme/isotope/isotope.pkgd.min.js') }}"></script>

  <script src="{{ asset('js-theme/main.js') }}"></script>
</body>

</html>
