@extends('layouts.app')

@section('content')
<div class="container-fluid profile">
 <div class="card">
    <div class="row father justify-content-center">
        <div class="col-md-12 text-center welcome">
         <span>Welcome To Tweet Profiles !</span>   
        </div>
                <div class="col-md-6 col-sm-5 col-6 avatar">
                    <img src="{{asset('storage/'. $user->image)}}" alt="avatar" class="rounded-circle img-thumbnail ">
                    <div class="sub">
                    <h3>These are some information about our users if you like to follow them and see their tweet.</h3>
                    @if(auth()->user()->isNot($user))
                   @if(auth()->user()->isFollowing($user))
                   <a href="{{ route('user.unfollow', $user) }}" class="btn btn-block btn-danger">Unfollow</a>
                   @else
                   <a href="{{ route('user.follow', $user) }}" class="btn btn-block btn-success">Follow</a>
                   @endif
                   @endif
                   </div>
               </div>
        <div class="col-md-6 col-sm-7 col-6 info">
            <div class="infos user-info">
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
           
        </div>
    </div> 
  </div>
</div>
@endsection
