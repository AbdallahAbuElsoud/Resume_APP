@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-3">
                <div class="col">
                  <h2 class="page-title">Portfolio</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>New Project</button>
                </div>
              </div>
              <div class="container-fluid card shadow" id="container">
                 <!-- ======= Portfolio Section ======= -->
                  <section id="portfolio" class="portfolio section-bg card-body">
                    <div class="container" data-aos="fade-up">
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
                              <div class="dropdown" style="text-align: end;margin-top: 10px;background-color: #bfbdbd3d;">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i></button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <a class="dropdown-item" onclick="confirm(event);" href="{{ url('remove_portfolio/'.$port -> id) }}"><i class="fa-solid fa-xmark"></i> Delete</a> 
                                  <a class="dropdown-item" href="{{ url('edit_Portfolio/'.$port -> id) }}"><i class="fa fa-gear"> </i> Edit</a>
                                </div>
                              </div>
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
                  </section><!-- End Portfolio Section -->
              </div>
              <!-- new event modal -->
              <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="varyModalLabel">New Project</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="/storeprotfolio" method="post" id="form" enctype='multipart/form-data' >
                    @csrf
                        <div class="form-group">
                          <label for="title" class="col-form-label">Title <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Add project  title" required>
                        </div>
                        <div class="form-group">
                          <label for="dis" class="col-form-label">Description <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <textarea class="form-control" id="dis" name="dis" placeholder="Add some Discription for your project"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="client" class="col-form-label">Client <i style="color: #a6a1a1;font-size: smaller;">(Optinal)</i></label>
                          <input type="text" class="form-control" id="client" name="client" placeholder="Add project  Clinent" >
                        </div>
                        <div class="form-group">
                          <label for="URL" class="col-form-label">Project URL <i style="color: #a6a1a1;font-size: smaller;">(Optinal)</i></label>
                          <input type="text" class="form-control" id="URL" name="URL" placeholder="Add project  URL" >
                        </div>
                        <div class="form-group">
                          <label for="photo" class="col-form-label">Image <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <input type="file" class="filepond" id="photo" name="photo" placeholder="Add Photo" accept="image/*" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3" required>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="Type">Category <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <select id="Type"  name="Type" class="form-control select2">
                              <option value="web">Web APP</option>
                              <option value="mob">Mobile APP</option>
                              <option value="design">Designs</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">

                      <button type="submit" class="btn mb-2 btn-primary col">Save Event</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div> <!-- new event modal -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->

       
@endsection  


@section('script')

 <script>
      /**
     * Porfolio isotope and filter
     */
    window.addEventListener('load', () => {
      let portfolioContainer = select('.portfolio-container');
      if (portfolioContainer) {
        let portfolioIsotope = new Isotope(portfolioContainer, {
          itemSelector: '.portfolio-item'
        });

        let portfolioFilters = select('#portfolio-flters li', true);

        on('click', '#portfolio-flters li', function(e) {
          e.preventDefault();
          portfolioFilters.forEach(function(el) {
            el.classList.remove('filter-active');
          });
          this.classList.add('filter-active');

          portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          portfolioIsotope.on('arrangeComplete', function() {
            AOS.refresh()
          });
        }, true);
      }

    });

    /**
     * Initiate portfolio lightbox 
     */
    const portfolioLightbox = GLightbox({
      selector: '.portfolio-lightbox'
    });

    /**
     * Initiate portfolio details lightbox 
     */
    const portfolioDetailsLightbox = GLightbox({
      selector: '.portfolio-details-lightbox',
      width: '90%',
      height: '90vh'
    });

    /**
     * Portfolio details slider
     */
    new Swiper('.portfolio-details-slider', {
      speed: 400,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      }
    });
 </script> 
@endsection  
