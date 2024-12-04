@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Social Media</h2>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>New Link</button>
        </div>
        </div>
        <br>
        <br>
        <br>
    @if(!empty($socials))
        <div class="container sectionofcategory ">
            @foreach($socials as $social) 
                <div class="card container" style="width: 14rem;margin-bottom: 10px;">
                    <div class="dropdown" style="text-align: end;margin-top: 10px;">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i></button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" onclick="confirm(event);" style="color: red;" href="{{ url('remove_social/'.$social -> id) }}"><i class="fa-solid fa-xmark"></i> Delete</a> 
                        </div>
                    </div>
                    <div class="card-body sectionofcategory">
                        <div class="wrapcategory">
                            <a href="{{$social -> url}}" target="_blank">
                                <div class="containercategory " style="background : #e8f4ff">
                                    <i class="{{$social -> icon}}"></i>
                                </div>
                            </a>
                        </div>
                    </div>                             

                    <br>
                </div>
            @endforeach
        </div>    
    @else
        <div class="col align-items-center card container">
            <br><br>
            <img src="{{url('assets/img/undraw_access_denied_re_awnf.png')}}" alt="ERROR" style="width: 500px;">
            <h4 >No Data From DB</h4>
            <br><br>
        </div>
    @endif
        <!-- new event modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="varyModalLabel">New Link</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="/storesocial" method="post" id="form"  >
                    @csrf
                        <div class="form-group">
                          <label for="icon" class="col-form-label">Icon * </i></label>
                          <input type="text" class="form-control" id="icon" name="icon" placeholder="Add the icon font from box icon" required>
                          <small>You can copy the class from box icon font
                            <a href="https://boxicons.com/" class="portfolio-details-lightbox" data-glightbox="type: external" title="BOX Icon"><i class='bx bx-info-circle'  style="font-size: larger;"></i></a>                        
                            </small>
                        </div>
                        <div class="form-group">
                          <label for="url" class="col-form-label">Link (URL) *</i></label>
                          <input type="text" class="form-control" id="url" name="url" placeholder="Add the url of the social media" required>
                        </div>
                        <br>
                        
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="submit" class="btn mb-2 btn-primary col">Save Link</button>
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