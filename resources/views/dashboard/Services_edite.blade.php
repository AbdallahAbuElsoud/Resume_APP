@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
<div class="row  container-fluid card shadow">
    <div class="col-12">
        <div class="row align-items-center my-3">
            <div class="col">
                <h2 class="page-title">Edit service :: {{$service -> titel}}</h2>   
            </div>
        </div>             
    </div> <!-- .col-12 -->
        @if(!empty($service))

            <form action="/update_service" method="post" id="form"  class="card-body">
            @csrf
            <div class="row">
                
                    <div class="col-sm-6 ">
                        <label for="oldimg" class="col-form-label">Old Image</i></label><br>
                        <img src="{{asset($service->img)}}" id="oldimg" name="oldimg" value="{{$service -> titel}} photo" style="width: 200px;">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="hidden" id="id" name="id" value="{{$service->id}}" >

                        <div class="form-group">
                          <label for="title" class="col-form-label">Title *</i></label>
                          <input type="text" class="form-control" id="title" name="title" value="{{$service -> titel}}" required>
                        </div>

                        <div class="form-group">
                          <label for="dis" class="col-form-label">Description *</i></label>
                          <textarea class="form-control" id="dis" name="dis" required>{{$service -> dis}}</textarea>
                        </div>

                        <div class="form-group">
                          <label for="color">Color *</label>
                          <select id="color"  name="color" class="form-control select2 {{$service->color}}" style="background-color: ;">
                            <option value="iconbox-blue" style="background-color: #47aeff;" @if($service->color =="iconbox-blue") selected @endif>blue</option>
                            <option value="iconbox-orange" style="background-color: #ffa76e;" @if($service->color =="iconbox-orange") selected @endif>orange</option>
                            <option value="iconbox-pink" style="background-color: #e80368;" @if($service->color =="iconbox-pink") selected @endif>pink</option>
                            <option value="iconbox-yellow" style="background-color: #ffbb2c;" @if($service->color =="iconbox-yellow") selected @endif>yellow</option>
                            <option value="iconbox-red" style="background-color: #ff5828;" @if($service->color =="iconbox-red") selected @endif>red</option>
                            <option value="iconbox-teal" style="background-color: #11dbcf;" @if($service->color =="iconbox-teal") selected @endif>teal</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="col-form-label">Image *</label>
                            <input type="file" class="filepond" id="photo" name="photo" placeholder="Add Imaget" accept="image/*" >
                        </div>

                    </div>
                </div>
                <br><br><br>
                <button type="submit" class="btn col btn-primary">Edit service</button>
                <br>
            </form>
        @else
            <div class="col align-items-center card container">
                <img src="{{url('assets/img/undraw_access_denied_re_awnf.png')}}" alt="ERROR" style="width: 500px;">
                <h4 >No Data From DB</h4><br>
            </div>  
        @endif
    
</div> <!-- .container-fluid -->   

@endsection  

@section('script') 

@endsection  