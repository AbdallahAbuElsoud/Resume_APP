@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')

          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-3">
                <div class="col">
                  <h2 class="page-title">Services</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>New Service</button>
                </div>
              </div>
              <br>
              <br>
              @if(!empty($services) )
                <!-- ======= Services Section ======= -->
                <section id="services" class="services">
                  <div class="container" data-aos="fade-up">
                    <div class="row">
                    @foreach($services as $service) 
                      <div class="col-lg-4 col-md-6 d-flex align-items-stretch  " data-aos="zoom-in" data-aos-delay="100">
   
                        <div class="icon-box {{$service->color}} card-body">
                          <div class="dropdown" style="text-align: end;margin-top: 10px;">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i></button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              <a class="dropdown-item" onclick="confirm(event);" href="{{ url('remove_services/'.$service -> id) }}"><i class="fa-solid fa-xmark"></i> Delete</a> 
                              <a class="dropdown-item" href="{{ url('edit_service/'.$service -> id) }}"><i class="fa fa-gear"> </i> Edit</a>
                            </div>
                          </div> 
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
             
              @else
                <div class="col align-items-center card container">
                  <img src="{{url('assets/img/undraw_access_denied_re_awnf.png')}}" alt="ERROR" style="width: 500px;">
                  <h4 >No Data From DB</h4>
                </div>
              @endif
            

              <!-- new event modal -->
              <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="varyModalLabel">New Service</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="/storeservices" method="post" id="form"  >
                    @csrf
                        <div class="form-group">
                          <label for="title" class="col-form-label">Title *</i></label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Add Service Title" required>
                        </div>

                        <div class="form-group">
                          <label for="dis" class="col-form-label">Description *</i></label>
                          <textarea class="form-control" id="dis" name="dis" placeholder="Add Service Description" required></textarea>
                        </div>

                        <div class="form-group">
                          <label for="color">Color *</label>
                          <select id="color"  name="color" class="form-control select2">
                            <option value="iconbox-blue" style="background-color: #47aeff;">blue</option>
                            <option value="iconbox-orange" style="background-color: #ffa76e;">orange</option>
                            <option value="iconbox-pink" style="background-color: #e80368;">pink</option>
                            <option value="iconbox-yellow" style="background-color: #ffbb2c;">yellow</option>
                            <option value="iconbox-red" style="background-color: #ff5828;">red</option>
                            <option value="iconbox-teal" style="background-color: #11dbcf;">teal</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="photo" class="col-form-label">Image *</label>
                          <input type="file" class="filepond" id="photo" name="photo" placeholder="Add Imaget" accept="image/*" required>
                        </div>
                        <br>
                        
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="submit" class="btn col mb-2 btn-primary">Save Service</button>
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
@endsection  