<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use DB;

class ShowMovieController extends Controller
{
    public function show($id, $title)
    {
        $movieId = $id;
        $movieTitle = $title;
        $user_id = User::all();
        $reviews = DB::table('reviews')
        ->where([
            ['movie_id', '=', $id],
        ])->get();
        return view('show.show', compact('movieId', 'movieTitle', 'reviews'));
    }

    public function similar($id, $title)
    {
        $movieId = $id;
        $Title = $title;

        return view('movies.similar', compact('movieId', 'Title'));
    }

}
