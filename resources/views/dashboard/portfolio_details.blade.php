<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Abdallah H Abu El Soud Resume</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('assets/img/mylogo.png')}}" rel="icon">
  <link href="{{url('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

</head>

<body>

  <main id="main">
  @if(!empty($portfolio))
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6  ">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                  @foreach($imgs as $img)
                    <div class="swiper-slide">
                      <img src="{{$img}}" alt="{{asset('$img')}}">
                    </div>
                  @endforeach
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="portfolio-info">
                <h3>{{$portfolio->titel}} information</h3>
                <ul>
                  <li><strong>Category</strong>: {{$portfolio->category}}</li>
                  @if(!empty($portfolio->client) || !(($portfolio->client) == ''))<li><strong>Client</strong>: {{$portfolio->client}}</li>@endif
                  @if(!empty($portfolio->url) || !(($portfolio->url) == ''))<li><strong>Project URL</strong>: <a href="{{$portfolio->url}}">{{$portfolio->url}}</a></li>@endif
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Description</h2>
                <p>{!! nl2br($portfolio->des) !!}</p>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Details Section -->
  @else
    <div class="col align-items-center card container">
      <img src="{{url('assets/img/undraw_access_denied_re_awnf.png')}}" alt="ERROR" style="width: 500px;">
      <h4 >No Data From DB</h4><br>
    </div>
  @endif
    

  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{url('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('assets/vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{url('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{url('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('assets/js/main.js')}}"></script>

</body>

</html>