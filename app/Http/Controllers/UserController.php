<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\http\UploadedFile;
use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('/user', compact('user'));
    }
    public function profile() {
        return view('/profile', array('user'=> Auth::user()));
    }
    public function update_avatar(Request $request) {
        if($request->hasFile('image')) {
            Auth::user()->image = $request->image->store('image');
            Auth::user()->save();
        }
        
        return view('/profile', array('user'=> Auth::user()));
    }
    public function follow(Request $request, User $user)
    {
    if($request->user()->canFollow($user)) {
        $request->user()->following()->attach($user);
    }
    return redirect()->back();
    }
    public function unFollow(Request $request, User $user)
{
   if($request->user()->canUnFollow($user)) {
       $request->user()->following()->detach($user);
    }
       return redirect()->back();
}
}
