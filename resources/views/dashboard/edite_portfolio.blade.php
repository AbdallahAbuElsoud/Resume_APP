<!DOCTYPE html>
<html lang="en">

<head>
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
@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
  <main id="main">

  @if(!empty($portfolio))
  <div class="container-fluid card shadow">
     <!-- ======= Portfolio Details Section ======= -->
     <section id="portfolio-details" class="portfolio-details card-body">
     <form action="/update_protfolio" method="post" id="form" enctype='multipart/form-data' >
     @csrf
     <input class="form-control" type="hidden" id="id" name="id" value="{{$portfolio->id}}" >
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
                <input type="file" class="filepond" id="photo" name="photo"  accept="image/*" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="portfolio-info">
                <h3>Edit {{$portfolio->titel}} information</h3>
                <ul>
                  <li><strong>Title</strong>:<input type="text" class="form-control" id="title" name="title" value="{{$portfolio->titel}}" required></li>  
                  <li><strong>Client</strong>:<i style="color: #a6a1a1;font-size: smaller;">(Optinal)</i><input type="text" class="form-control" id="client" name="client" value="{{$portfolio->client}}"></li>
                  <li><strong>Project URL</strong>:<i style="color: #a6a1a1;font-size: smaller;">(Optinal)</i><input type="text" class="form-control" id="URL" name="URL" value="{{$portfolio->url}}"></li>
                  <li><strong>Category</strong>:
                            <select id="Type"  name="Type" class="form-control select2">
                              <option value="web">Web APP</option>
                              <option value="mob">Mobile APP</option>
                              <option value="design">Designs</option>
                            </select></li>
                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Description</h2>
                <textarea class="form-control" id="dis" name="dis" rows="10">{{$portfolio->des}}</textarea>
                <!-- <p>{!! nl2br($portfolio->des) !!}</p> -->
              </div>
            </div>

          </div>

        </div>
        <br><br>
        <button type="submit" class="btn col btn-primary">Edit</button>
        <br>
      </form>
      </section><!-- End Portfolio Details Section -->
  </div>   
  @else
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="row align-items-center my-3">
        <div class="col">
          <img src="{{url('assets/img/undraw_access_denied_re_awnf.png')}}" alt="ERROR" style="width: 500px;">
          <h4>No Data From DB</h4>
        </div>
      </div>
    </div>
  </div>
  @endif
    

  </main><!-- End #main -->

@endsection
@section('script')  
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
@endsection  
</body>

</html>