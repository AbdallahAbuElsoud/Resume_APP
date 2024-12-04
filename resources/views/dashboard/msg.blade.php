@extends('layouts.dashboard')
@section('title-ar' , 'السيرة الذاتيةلـ عبدالله')
@section('title-en' , 'Abdallah CV')

@section('content')
@if(!empty($masseges))
    <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                <div class="row">
                    <!-- Small table -->
                    <div class="col-md-12 my-4">
                    <h2 class="h4 mb-1">Messages </h2>
                    <br>
                    <div class="card shadow">
                        <div class="card-body table-responsive">
                        <!-- table -->
                         <div class="table-responsive">
                            <table class="table table-borderless table-hover align-middle">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th class="w-25">Content</th>
                                    <th>Date</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($masseges as $msg)   
                                    <tr>
                                        <td>
                                            <div class="avatar avatar-md">
                                                <img src="https://eu.ui-avatars.com/api/?name={{$msg->name}}&background=random " alt="{{$msg->name}} " class="avatar-img rounded-circle">
                                            </div>
                                        </td>
                                        <td>
                                        <p class="mb-0 text-muted"><strong>{{$msg->name}}</strong></p>
                                        <small class="mb-0 text-muted">{{$msg->id}}</small>
                                        </td>
                                        <td>
                                        <p class="mb-0 text-muted">{{$msg->email}}</p>
                                        </td>
                                        <td>
                                        <p class="mb-0 text-muted">{{$msg->subject}}</p>
                                        </td>
                                        <td class="w-25"><small class="text-muted"> {{$msg->msg}}</small></td>
                                        <td class="text-muted">{{ \Carbon\Carbon::parse($msg->created_at)->diffForHumans() }}</td>
                                        <td>
                                        <a class="dropdown-item" onclick="confirm(event);" href="{{ url('remove_msg/'.$msg -> id) }}"><i class="fe fe-trash" Style="color: red;"></i></a> 
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                         </div>
                         {{ $masseges->links() }}
                        </div>
                    </div>
                    </div> <!-- customized table -->
                </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@else
    <div class="col align-items-center card container">
        <img src="{{url('assets/img/undraw_access_denied_re_awnf.png')}}" alt="ERROR" style="width: 500px;">
        <h4 >No Data From DB</h4>
    </div>
@endif
@endsection  

@section('script')

@endsection  