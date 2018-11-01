<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Favorites;
use App\Profile;
use DB;

class ShowMovieController extends Controller
{
    public function show($id, $title)
    {
        $userid = auth()->id();
        $user = User::find($userid);
        $favorites = DB::table('favorites')->where([
            ['user_id', '=', $userid],
            ['movie_id', '=', $id]
        ])->first();

        $num = count($favorites);

        $movieId = $id;
        $movieTitle = $title;
        $user_id = User::all();
        $reviews = DB::table('reviews')
        ->where([
            ['movie_id', '=', $id],
        ])->get();
        return view('show.show', compact('movieId', 'movieTitle', 'reviews', 'user', 'favorites', 'num'));
    }

    public function similar($id, $title)
    {
        $movieId = $id;
        $Title = $title;

        return view('movies.similar', compact('movieId', 'Title'));
    }

    public function favorite($id)
    {
        $user = auth()->id();
        $movie_id = $id;
        $duplicate = DB::table('favorites')->where([
            ['user_id', '=', $user],
            ['movie_id', '=', $id],
        ])->count();
        if(! $duplicate){
            $favorites = new Favorites;
            $favorites->movie_id = $movie_id;
            $favorites->user_id = $user;
            $favorites->yup = 1;
            $favorites->save();
        }


        return redirect()->back();

    }

    public function unfavorite($id)
    {
        $user_id = auth()->id();
        $favorites = DB::table('favorites')->where('user_id', $user_id)
                                   ->where('movie_id', $id)->delete();


        return redirect()->back();
    }
}
