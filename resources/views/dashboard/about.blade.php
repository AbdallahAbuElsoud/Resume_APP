@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
<form action="/update_about" method="post" enctype="multipart/form-data" class="container-fluid card shadow" >
    {!! csrf_field() !!}
    <div class="row justify-content-center ">
        <div class="col-12">
            <div class="row align-items-center my-3">
                <div class="col ">
                    <h2 class="page-title">Name and Roles</h2>   
                </div>
            </div>             
        </div> <!-- .col-12 -->
        <div class="col ">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" value="{{$about->name}}" required>
            <br>
            <label for="rolse">Roles</label>
            <input class="form-control" id="role" name="role" value="{{implode(', ',json_decode($about->roles))}}" required>   
        </div>
    </div> <!-- .container-fluid -->
    <br>
    <br>
    <div class="row justify-content-center container-fluid card shadow">
        <div class="col-12">
            <div class="row align-items-center my-3">
                <div class="col">
                    <h2 class="page-title">About</h2>   
                </div>
            </div>            
        </div> <!-- .col-12 -->
    </div> <!-- .container-fluid -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

                    <label for="brfabout">Brief Description About Yourself</label>
                    <textarea class="form-control p-title" id="brfabout" name="brfabout" rows="5" required>{{$about->brfabout}}</textarea><br><br>


                <div class="row">
                    <div class="col-lg-4">
                        <img style="border-radius: 50%;" src="{{url($about->profile_photo_path)}}" class="img-fluid" alt="my Photo"><br><br>
                        <input class="col-12" type="file" id="photo" name="photo" class="filepond" accept="image/*"  >
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content">
                    <h3> Web Developer &amp; E-commerce Specialist.</h3>
                    <p class="fst-italic">
                        ***************************************************************************
                    </p>
                    <div class="row">
                        <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong><input type="text" name="DOB" id="DOB" class="form-control"  value="{{$about->DOB }}" required></li>
                            <!-- <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li> -->
                            <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong><input type="text" name="phone" id="phone" class="form-control"  value="{{$about->phone }}" required></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>City:</strong><input type="text" name="city" id="city" class="form-control"  value="{{$about->city }}" required></li>
                        </ul>
                        </div>
                        <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>@if(!empty($age) )<span>{{$age}}</span>@else <span>1998</span>@endif</li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong><input type="text" name="degree" id="degree" class="form-control"  value="{{$about->degree }}" required></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong><input type="text" name="email" id="email" class="form-control"  value="{{$about->email }}" required></li>
                        </ul>
                        </div>
                    </div>
                    </div>
            </div>
            <br>
            <br>

        </div>
    </section><!-- End About Section -->
    <button type="submit" class="btn col btn-primary">Save</button>
    <br><br>
</form>       
@endsection  

@section('script') 

@endsection  