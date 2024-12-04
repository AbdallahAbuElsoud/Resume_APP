@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')

          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-3">
                <div class="col">
                  <h2 class="page-title">Skills</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>New Skille</button>
                </div>
              </div>
              <br>
              <br>
              <br>
              @if(!empty($skills) )
                <div class="container sectionofcategory ">
                  @foreach($skills as $skille) 
                      <div class="card container" style="width: 14rem;margin-bottom: 10px;">
                        <div class="dropdown" style="text-align: end;margin-top: 10px;">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><i class="fa-solid fa-ellipsis-vertical" style="color: black;"></i></button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <a class="dropdown-item" onclick="confirm(event);" href="{{ url('remove_skille/'.$skille -> id) }}"><i class="fa-solid fa-xmark"></i> Delete</a> 
                            <a class="dropdown-item" href="{{ url('edit_skille/'.$skille -> id) }}"><i class="fa fa-gear"> </i> Edit</a>
                          </div>
                        </div>
                        <div class="card-body sectionofcategory">
                          <div class="wrapcategory">
                            <div class="containercategory " style="background : #e8f4ff">
                              <img src="{{asset($skille->photo)}}" alt="{{$skille -> title}} photo" style="width: 50px;">
                            </div>
                            <div style="width: 100px;height: 20px; text-align: center;  margin-top: 10px;"><p>{{$skille -> title}}</p></div>
                          </div>
                        </div>                             

                        <br>
                      </div>
                  @endforeach
                </div>
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
                      <h5 class="modal-title" id="varyModalLabel">New skille</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-4">
                    <form action="/storeskills" method="post" id="form"  >
                    @csrf
                        <div class="form-group">
                          <label for="skilletitle" class="col-form-label">Title *</i></label>
                          <input type="text" class="form-control" id="skilletitle" name="skilletitle" placeholder="Add Skille Title" required>
                        </div>
                        <div class="form-group">
                          <label for="photo" class="col-form-label">Image *</label>
                          <input type="file" class="filepond" id="photo" name="photo" placeholder="Add Imaget" accept="image/*" required>
                        </div>
                        <br>
                        
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="submit" class="btn mb-2 btn-primary">Save Skille</button>
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