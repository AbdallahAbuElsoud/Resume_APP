
@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتية لـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
              <div class="row mt-5 align-items-center">
                <div class="col-md-3 text-center mb-5">
                  <div class="avatar avatar-xl">
                    <img src="{{url($about->profile_photo_path)}}" alt="..." class="avatar-img rounded-circle" style="width: 150px;">
                  </div>
                </div>
                <div class="col">
                  <div class="row align-items-center">
                    <div class="col-md-7">
                      <h4 class="mb-1">{{$about->name}}</h4>
                      <p class="small mb-3"><span class="badge badge-dark">{{$about->city}}</span></p>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-7">
                      <p class="text-muted">{{$about->brfabout}}</p>
                    </div>
                    <div class="col">
                      <p class="small mb-0 text-muted">{{$about->DOB}}</p>
                      <p class="small mb-0 text-muted">{{$about->email}}</p>
                      <p class="small mb-0 text-muted">{{$about->phone}}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                          <p class="small text-muted mb-0">Num of Massege</p>
                          <span class="h2 mb-0">{{$msgcount}}</span>
                        </div>
                        <div class="col-auto">
                            <span class='fe fe-32 bx bx-chat text-muted mb-0'></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                            <p class="small text-muted mb-0">php version</p>
                            <span class="h2 mb-0">{{phpversion()}}</span>
                        </div>
                        <div class="col-auto">
                            <span class='fe fe-32 bx bxl-php text-muted mb-0'></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4">
                  <div class="card shadow">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col">
                            <p class="small text-muted mb-0">Laravel version</p>
                            <span class="h2 mb-0">{{ app()->version() }}</span>
                        </div>
                        <div class="col-auto">
                            <span class='fe fe-32 bx bx-code-alt text-muted mb-0'></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- end section -->
        </div>
    </div>
</div>

@endsection

