<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth()->id();
        Review::create($data);
        return redirect()->back();
    }
}
