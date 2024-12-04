@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
<div class="row  container-fluid card shadow">
    <div class="col-12">
        <div class="row align-items-center my-3">
            <div class="col">
                <h2 class="page-title">Edit Skille :: {{$skille -> title}}</h2>   
            </div>
        </div>             
    </div> <!-- .col-12 -->
        @if(!empty($skille))

            <form action="/update_skille" method="post" id="form"  class="card-body">
            @csrf
            <div class="row">
                    <div class="col-sm-6 ">
                        <label for="oldimg" class="col-form-label">Old Image</i></label><br>
                        <img src="{{asset($skille->photo)}}" id="oldimg" name="oldimg" alt="{{$skille -> title}} photo" style="width: 200px;">
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control" type="hidden" id="skilleid" name="skilleid" value="{{$skille->id}}" >

                        <div class="form-group">
                            <label for="skilletitle" class="col-form-label">Title *</i></label>
                            <input type="text" class="form-control" id="skilletitle" name="skilletitle" placeholder="{{$skille -> title}}" required>
                        </div>

                        <div class="form-group">
                            <label for="photo" class="col-form-label">Image *</label>
                            <input type="file" class="filepond" id="photo" name="photo" placeholder="Add Imaget" accept="image/*" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn col btn-primary">Edit Skille</button>
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