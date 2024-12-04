<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Abdallah H Abu El Soud Resume</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/mylogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
@include('sweetalert::alert')

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Dashboard</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
        <li><a href="#skills" class="nav-link scrollto"><i class='bx bxs-flame'></i> <span>Skills</span></a></li>
        <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Portfolio</span></a></li>
        <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
     @if(!empty($about) )
        <h1>{{$about->name}}</h1>
     @else
         <h1>Abdallah Hasan Abu El Soud</h1>
     @endif

      @if(!empty($about) )
      <script>
        const roles ={{$about->roles}};
        let rolsetotext = roles.toString();
        alart($rolsetotext);
    </script>
        <p>I'm <span class="typed" data-typed-items="{{implode(', ',json_decode($about->roles))}}"></span></p>
      @else
        <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Photographer"></span></p>
      @endif

      @if(!empty($socials))
        <div class="social-links">
          @foreach($socials as $social) 
            <a href="{{$social -> url}}"  target="_blank"><i class="{{$social -> icon}}"></i></a>
          @endforeach
        </div>
      @endif
<br>
      <!-- <a class="DNPT" role="button" href="assets\img\mylogo.png"
        download="AbdallahAbuElSoud_Rusme">
        Download C'V
      </a> -->

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          @if(!empty($about) )
          <p>{{$about->brfabout}}</p>
          @else
          <p>Very simple and lover of computing and technologies. I love training and education and always want to benefit others whenever I have time. I was born in Amman in the Hashemite Kingdom of Jordan and I hope to be a reason to develop this land that has given me so much. I believe in the idea that “a person is the result of his actions” so I deal with others building what they choose for themselves. Comedy sometimes and I do not like formalities and affection in appearances and talk.</p>
          @endif
        </div>


        <div class="row">
          <div class="col-lg-4">
            <img style="border-radius: 50%;" src="{{url($about->profile_photo_path)}}" class="img-fluid" alt="my Photo">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3> Web Developer &amp; E-commerce Specialist.</h3>
            <p class="fst-italic">
              ***************************************************************************
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong>@if(!empty($about) )<span>{{$about->DOB}}</span>@else<span>25 May 1998</span>@endif</li>
                  <!-- <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li> -->
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>@if(!empty($about) )<span>{{$about->phone}}</span>@else<span>+966535413595</span>@endif</li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong>@if(!empty($about) )<span>{{$about->city}}</span>@else<span>Riyadh, Saudi Arabia</span>@endif</li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>@if(!empty($about) && !empty($age) )<span>{{$age}}</span>@else<span>sence 1998</span>@endif</li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>@if(!empty($about) )<span>{{$about->degree}}</span>@else <span>Bachelor</span>@endif</li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>@if(!empty($about) )<span>{{$about->email}}</span>@else <span>abdallah.h.abuelsoud@gmail.com</span>@endif</li>
                  <!-- <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li> -->
                </ul>
              </div>
            </div>
            <!-- <p>
              Interested in the technical field in general, including hardware, software and maintenance of mobiles and computers <br><br>
              Self-initiative - Creative – Team player – Non-quitter The ability to deal with problems, and very interested in competitive programming.
              
            </p> -->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

    <!-- ======= Skills Section class="skills section-bg" ======= -->
    <section id="skills" class="maincontenerofcategory" >
      <div class="section-title">
        <h2>Skills</h2>
        <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
      </div>

      <div class="container sectionofcategory" data-aos="fade-up">
        @if(!empty($skills) )
          @foreach($skills as $skille) 
            <div class="wrapcategory">
              <div class="containercategory " style="background : #e8f4ff">
                <img src="{{asset($skille->photo)}}" alt="{{$skille -> title}} photo" alt="icone" style="width: 50px;">
              </div>
              <div style="width: 100px;height: 20px; text-align: center;  margin-top: 10px;"><p>{{$skille -> title}}</p></div>
            </div>
          @endforeach 
        @else
          <div>No Data</div>
        @endif

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Resume</h2>
        </div>

        <div class="row">
            <div class="col-lg-12 card-body">
                  <h3 class="resume-title">Education</h3>
                      @if(!empty($resume))
                          @foreach($resume as $res)
                              @if($res->type == 'edu')
                                <div class="resume-item">
                                    <h4>{{$res->titel}}</h4>  
                                    <p><em>{{$res->where}}</em></p>
                                    <h5>From: {{explode(" " ,$res->from)[0]}} - To: {{explode(" " ,$res->To)[0]}}</h5>                                            
                                    <p>{!! nl2br($res->des) !!}</p>
                                </div>
                              @endif
                          @endforeach
                      @endif
              </div>
              <div class="col-lg-12">
                  <h3 class="resume-title">Professional Experience</h3>
                  @if(!empty($resume))
                          @foreach($resume as $res)
                              @if($res->type == 'exp')
                                  <div class="resume-item">
                                      <h4>{{$res->titel}}</h4>  
                                      <p><em>{{$res->where}}</em></p>
                                      <h5>From: {{explode(" " ,$res->from)[0]}} - To: {{explode(" " ,$res->To)[0]}}</h5>                                            
                                      <p>{!! nl2br($res->des) !!}</p>
                                  </div>
                              @endif
                          @endforeach
                      @endif                     
            </div>
        </div>

      </div>
    </section><!-- End Resume Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg card-body">
      <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>Portfolio</h2>
        </div>
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-web">Web App</li>
              <li data-filter=".filter-mob">Mobile APP</li>
              <li data-filter=".filter-design">Design</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @if(!empty($Portfolio))
            @foreach($Portfolio as $port)
              <div class="col-lg-4 col-md-6 portfolio-item {{($port->category == 'web') ? 'filter-web' : ''}} {{($port->category == 'mob') ? 'filter-mob' : ''}} {{($port->category == 'design') ? 'filter-design' : ''}}">
                <div class="portfolio-wrap">
                  <img src="{{explode(',', $port->photos)[0]}}" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>{{$port->titel}}</h4>
                    <p>{!! nl2br($port->des) !!}</p>
                    <div class="portfolio-links">
                      <a href="{{asset(explode(',', $port->photos)[0])}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$port->titel}}"><i class="bx bx-plus"></i></a>
                      <a href="{{ url('portfolio_details/'.$port->id) }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          @endif                        
        </div>
      </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">

          @foreach($services as $service) 
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box {{$service->color}}">
                <div class="icon">
                  <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                    <img src="{{$service->img}}" alt="{{$service->titel}}" style="width: 36px;height: 36px;position: relative;transition: 0.5s;">
                  </svg>
                </div>
                <h4>{{$service->titel}}</h4>
                <p>{!! nl2br($service->dis) !!}</p>
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                @if(!empty($about) )<p>{{$about->city}}</p>@else<p>Riyadh, Saudi Arabia</p>@endif
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                @if(!empty($about) )<p>{{$about->email}}</p>@else <p>abdallah.h.abuelsoud@gmail.com</p>@endif
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                @if(!empty($about) )<p>{{$about->phone}}</p>@else<p>+966 53 541 3595</p>@endif
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="/sendmsg" method="post" role="form" class="php-email-form">
            @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      @if(!empty($about) )
          <h3>{{$about->name}}</h3>
      @else
          <h3>Abdallah Hasan Abu El Soud</h3>
      @endif
      @if(!empty($about) )
          <p>{{$about->brfabout}}</p>
          @else
          <p>Very simple and lover of computing and technologies. I love training and education and always want to benefit others whenever I have time. I was born in Amman in the Hashemite Kingdom of Jordan and I hope to be a reason to develop this land that has given me so much. I believe in the idea that “a person is the result of his actions” so I deal with others building what they choose for themselves. Comedy sometimes and I do not like formalities and affection in appearances and talk.</p>
          @endif
      @if(!empty($socials))
        <div class="social-links">
          @foreach($socials as $social) 
            <a href="{{$social -> url}}"  target="_blank"><i class="{{$social -> icon}}"></i></a>
          @endforeach
        </div>
      @endif
      <div class="copyright">
        &copy; Copyright <strong><span>AbdallahAbuElsoud</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        2025
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>



</body>

</html>