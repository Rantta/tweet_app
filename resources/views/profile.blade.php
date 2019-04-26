@extends('layouts.app')

@section('content')
<div class="container-fluid profile">
 <div class="card">
    <div class="row father justify-content-center">
        <div class="col-md-12 text-center welcome">
            Welcome To Your Tweet Profile !
        </div>
                <div class="col-md-5 avatar">
                    <img src="{{asset('storage/'. $user->image)}}" alt="avatar" class="rounded-circle img-thumbnail ">
                </div>
        <div class="col-md-7 info">
            <div class="infos">
                    <label><i class="fas fa-asterisk"></i> User Name :</label>
                    <h3> <i class="fas fa-star"></i> {{ $user->name }}</h2>
                    <label><i class="fas fa-asterisk"></i> Email Address :</label>
                    <h3><i class="fas fa-envelope"></i> {{ $user->email }}</h3>
                    @php
                        $create = substr($user->created_at,0 ,10);
                    @endphp
                    <label><i class="fas fa-asterisk"></i> Join Tweet At :</label>
                    <h3><i class="fas fa-clock"></i> {{  $create  }}</h3>
           </div>
          
            <form id="avatar-form" action="{{url('/profile')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Change Profile Picture :</h3>
                          <input type="file" name="image" class="" id="inputGroupFile03" form="avatar-form" aria-describedby="inputGroupFileAddon03">
                          <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                 <button class="btn btn-block btn-primary">submit</button>
            </form>
           
        </div>
    </div> 
  </div>
</div>
@endsection
