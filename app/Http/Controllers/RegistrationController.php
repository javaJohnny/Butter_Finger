<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        if($user){
            auth()->login($user);
        }else{
            return redirect()->back();
        }

        return redirect('/home');
    }
}
