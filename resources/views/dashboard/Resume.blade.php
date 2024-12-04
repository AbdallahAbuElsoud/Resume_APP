@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-3">
                <div class="col">
                  <h2 class="page-title">Resume</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>New</button>
                </div>
              </div>
              <br><br>
              @if(!empty($resume))
                <section id="resume" class="resume">
                  <div class="container-fluid card shadow">
                      <div class="row">
                      <div class="col-lg-12 card-body">
                          <h3 class="resume-title">Education</h3>
                                  @foreach($resume as $res)
                                      @if($res->type == 'edu')
                                      <div class="resume-item">
                                              <div class="row">
                                                  <div class="col-sm-10">
                                                      <h4>{{$res->titel}}</h4>
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <div class="dropdown" style="text-align: end;margin-top: 10px;">
                                                          <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: beige;" ><i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i></button>
                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                              <a class="dropdown-item" onclick="confirm(event);" href="{{ url('remove_resume/'.$res -> id) }}"><i class="fa-solid fa-xmark"></i> Delete</a> 
                                                              <a class="dropdown-item" href="{{ url('edit_resume/'.$res -> id) }}"><i class="fa fa-gear"> </i> Edit</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>   
                                              <p><em>{{$res->where}}</em></p>
                                              <h5>From: {{explode(" " ,$res->from)[0]}} - To: {{explode(" " ,$res->To)[0]}}</h5>                                            
                                              <p>{!! nl2br($res->des) !!}</p>
                                          </div>
                                      @endif
                                  @endforeach
                      </div>
                      <div class="col-lg-12">
                          <h3 class="resume-title">Professional Experience</h3>
                                  @foreach($resume as $res)
                                      @if($res->type == 'exp')
                                          <div class="resume-item">
                                              <div class="row">
                                                  <div class="col-sm-10">
                                                      <h4>{{$res->titel}}</h4>
                                                  </div>
                                                  <div class="col-sm-2">
                                                      <div class="dropdown" style="text-align: end;margin-top: 10px;">
                                                          <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background: beige;" ><i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i></button>
                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                              <a class="dropdown-item" onclick="myFunction(event);" href="{{ url('remove_resume/'.$res -> id) }}"><i class="fa-solid fa-xmark"></i> Delete</a> 
                                                              <a class="dropdown-item" href="{{ url('edit_resume/'.$res -> id) }}"><i class="fa fa-gear"> </i> Edit</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>   
                                              <p><em>{{$res->where}}</em></p>
                                              <h5>From: {{explode(" " ,$res->from)[0]}} - To: {{explode(" " ,$res->To)[0]}}</h5>                                            
                                              <p>{!! nl2br($res->des) !!}</p>
                                          </div>
                                      @endif
                                  @endforeach
                                                   
                        <br><br>
                      </div>
                      </div>

                  </div>
                </section><!-- End Resume Section -->
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
                      <h5 class="modal-title" id="varyModalLabel">New Event</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="/Storresume" method="post" id="form"  >
                    @csrf
                        <div class="form-group">
                          <label for="Title" class="col-form-label">Title <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <input type="text" class="form-control" id="Title" name="Title" placeholder="Add event title" required>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="start">From :<i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <div class="input-group">
                              <input type="date" class="form-control drgpicker" id="start" name="start"  required>
                            </div>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="end">To : <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <div class="input-group">
                              <input type="date" class="form-control drgpicker" id="end" name="end" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="where" class="col-form-label">Where <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <input type="text" class="form-control" id="where" name="where" placeholder="Add event title" required>
                        </div>
                        <div class="form-group">
                          <label for="Des" class="col-form-label">Description <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                          <textarea class="form-control" id="Des" name="Des" placeholder="Add some Description for your event"></textarea>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-12">
                            <label for="Type">Type <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                            <select id="Type"  name="Type" class="form-control select2">
                              <option value="edu">Education</option>
                              <option value="exp">Experience</option>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <div class="custom-control custom-switch">
                      </div>
                      <button type="submit" class="btn mb-2 btn-primary">Save</button>
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

@endsection  
