<!doctype html>
@if(App::getLocale()=='ar')
        <html dir="rtl">
    @else
    <html dir="ltr">
    @endif

@if(App::getLocale()=='ar')
        <title>@yield('title-ar' ,'السيرة الذاتيةلـ عبدالله')</title>
    @else
        <title>@yield('title-en' , 'Abdallah CV')</title>
    @endif
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <!-- Favicons -->
     
    <link href="{{url('assets/img/mylogo.ico')}}" rel="icon">
    <link href="{{url('assets/img/mylogo.ico')}}" rel="apple-touch-icon">
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{url('assets/css_dash/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{url('assets/css_dash/feather.css')}}">
    <!-- full calender  -->
    <link rel="stylesheet" href="{{url('assets/css_dash/fullcalendar.css')}}">
    
    <!-- link for filpond -->
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('assets/css_dash/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{url('assets/css_dash/select2.css')}}">
    <link rel="stylesheet" href="{{url('assets/css_dash/dropzone.css')}}">
    <link rel="stylesheet" href="{{url('assets/css_dash/uppy.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css_dash/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{url('assets/css_dash/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('assets/css_dash/quill.snow.css')}}">
    <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <!-- <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="{{url('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">




    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{url('assets/css_dash/daterangepicker.css')}}">
    <!-- App CSS -->
    @if(App::getLocale()=='ar')
      <link rel="stylesheet" href="{{url('assets/css_dash/app-light-rtl.css')}}" id="lightTheme">
      <link rel="stylesheet" href="{{url('assets/css_dash/app-dark-rtl.css')}}" id="darkTheme" disabled>
    @else
      <link rel="stylesheet" href="{{url('assets/css_dash/app-light.css')}}" id="lightTheme">
      <link rel="stylesheet" href="{{url('assets/css_dash/app-dark.css')}}" id="darkTheme" disabled>
    @endif

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>


    <!-- tosrar part =====> notification part -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- End of Tostar Part =====> notification part  --> 

    
  </head>
  <body class="vertical  dark  ">
          @include('layouts.upbar-dash')
          @include('layouts.sidebar-dash')
      <main role="main" class="main-content">
        <div class="container-fluid">
        <style>
          .filepond--credits {
          display: none;
          }
        </style>
        @yield('content')
        @include('sweetalert::alert')
        </div> <!-- .container-fluid -->
      </main> <!-- main -->
    </div> <!-- .wrapper -->
 
    <script src="{{url('assets/js_dash/jquery.min.js')}}"></script>
    <script src="{{url('assets/js_dash/popper.min.js')}}"></script>
    <script src="{{url('assets/js_dash/moment.min.js')}}"></script>
    <script src="{{url('assets/js_dash/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script src="{{url('assets/js_dash/simplebar.min.js')}}"></script>
    <script src="{{url('assets/js_dash/daterangepicker.js')}}"></script>
    <script src="{{url('assets/js_dash/jquery.stickOnScroll.js')}}"></script>
    <script src="{{url('assets/js_dash/tinycolor-min.js')}}"></script>
    <script src="{{url('assets/js_dash/config.js')}}"></script>
    <script src="{{url('assets/js_dash/d3.min.js')}}"></script>
    <script src="{{url('assets/js_dash/topojson.min.js')}}"></script>
    <script src="{{url('assets/js_dash/datamaps.all.min.js')}}"></script>
    <script src="{{url('assets/js_dash/datamaps-zoomto.js')}}"></script>
    <script src="{{url('assets/js_dash/datamaps.custom.js')}}"></script>
    <script src="{{url('assets/js_dash/Chart.min.js')}}"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{url('assets/js_dash/gauge.min.js')}}"></script>
    <script src="{{url('assets/js_dash/jquery.sparkline.min.js')}}"></script>
    <script src="{{url('assets/js_dash/apexcharts.min.js')}}"></script>
    <script src="{{url('assets/js_dash/apexcharts.custom.js')}}"></script>
    <script src="{{url('assets/js_dash/jquery.mask.min.js')}}"></script>
    <script src="{{url('assets/js_dash/select2.min.js')}}"></script>
    <script src="{{url('assets/js_dash/jquery.steps.min.js')}}"></script>
    <script src="{{url('assets/js_dash/jquery.validate.min.js')}}"></script>
    <script src="{{url('assets/js_dash/jquery.timepicker.js')}}"></script>
    <script src="{{url('assets/js_dash/dropzone.min.js')}}"></script>
    <script src="{{url('assets/js_dash/uppy.min.js')}}"></script>
    <script src="{{url('assets/js_dash/quill.min.js')}}"></script>
    <script src="https://use.fontawesome.com/49b98aaeb5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 

    <script src="{{url('assets/js_dash/apps.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{url('assets/js/main.js')}}"></script>
    <script src="{{url('assets/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{url('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{url('assets/vendor/typed.js/typed.min.js')}}"></script>
    <script src="{{url('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>

    <!-- full callender  -->
    <script src="{{url('assets/js_dash/fullcalendar.js')}}"></script>
    <script src="{{url('assets/js_dash/fullcalendar.custom.js')}}"></script>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    
    <script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
    FilePond.setOptions({
            server: {
                process :'/tmpUpload',
                revert  :'/tmpDelete',
                headers :{
                     "X-CSRF-Token": '{{csrf_token()}}',
                }
            }
        });
  </script>

<script>
  function confirm(ev) {
    ev.preventDefault();
    var url = ev.currentTarget.getAttribute('href');
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
      }else{
        event.preventDefault();
      }
    });
  }
 </script>
    @yield('script')
  
  
</body>
   
@include('layouts.notification_modal')
@include('layouts.shortcut_modal')
  </body>
</html>