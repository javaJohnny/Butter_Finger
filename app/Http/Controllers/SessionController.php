<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{


    public function __construct(){
    }

    public function show()
    {
        return view('layouts.master');
    }

    public function store(Request $request)
    {
        if(! auth()->attempt(request(['email', 'password'])))
        {
            return redirect()->back();
        }
        return redirect('/home');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }
}
