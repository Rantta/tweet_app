<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\http\UploadedFile;

class UserController extends Controller
{
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
}
