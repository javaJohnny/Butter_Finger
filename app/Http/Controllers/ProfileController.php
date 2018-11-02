<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('profile.show',compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit',compact('user'));
    }

    public function update($id)
    {
        $profile = Profile::find($id);
        $userid = auth()->id();
        $user = User::find($userid);

        $profile->name = request('name');
        $profile->phonenumber = request('phonenumber');
        $profile->location = request('location');
        $profile->save();

        return redirect('/profile/'. $userid);
    }

    public function showStat($id)
    {
        $user = User::find($id);

        return view('profile.stat', compact('user'));
    }


}
