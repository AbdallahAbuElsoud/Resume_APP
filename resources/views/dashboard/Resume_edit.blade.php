@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
<div class="row  container-fluid card shadow">
    <div class="col-12">
        <div class="row align-items-center my-3">
            <div class="col">
                <h2 class="page-title">Edit :: {{$resume -> titel}}</h2>   
            </div>
        </div>             
    </div> <!-- .col-12 -->
        @if(!empty($resume))
            <form action="/update_resume" method="post" id="form" class="card-body" >
            @csrf
            <div>{{explode(" " ,$resume->from)[0]}}</div>

             <input class="form-control" type="hidden" id="skilleid" name="skilleid" value="{{$resume->id}}" >

                <div class="form-group">
                    <label for="Title" class="col-form-label">Title <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                    <input type="text" class="form-control" id="Title" name="Title"  value="{{$resume->titel}}"required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="start">From :<i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                    <div class="input-group">
                        <input type="date" class="form-control drgpicker" id="start" name="start" value="{{explode(" " ,$resume->from)[0]}}" required>
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="end">To : <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                    <div class="input-group">
                        <input type="date" class="form-control drgpicker" id="end" name="end" value="{{explode(" " ,$resume->To)[0]}}"required>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="where" class="col-form-label">Where <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                    <input type="text" class="form-control" id="where" name="where" placeholder="Add event title" value="{{$resume->where}}"required>
                </div>
                <div class="form-group">
                    <label for="Des" class="col-form-label">Description <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                    <textarea class="form-control" id="Des" name="Des" rows="10">{{$resume->des}}</textarea>
                    <h6>To add Space between words add ("& n b s p ;")</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="Type">Type <i class="fa-solid fa-star-of-life" style="color: #ff0000;"></i></label>
                    <select id="Type"  name="Type" class="form-control select2" value="{{$resume->type}}">
                        <option value="edu" @if($resume->type =="edu") selected @endif >Education</option>
                        <option value="exp" @if($resume->type =="exp") selected @endif >Experience</option>
                    </select>
                    </div>
                </div>
                <button type="submit" class="btn col btn-primary">Save</button>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <div class="custom-control custom-switch">
                </div>
               
            </div>
            </form>
        @else
            <div>Somthing wrong !!</div>  
        @endif
    
</div> <!-- .container-fluid -->    
@endsection  

@section('script') 

@endsection  