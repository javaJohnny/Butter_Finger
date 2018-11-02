<?php
// SESSION ====================================================================//
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/home', function(){
    return view('layouts.home');
})->middleware('auth');
Route::get('/', function(){
    return view('auth.login');
})->name('login');
Route::get('/register', function(){
    return view('auth.register');
});

Route::group(['middleware' => ['web']], function(){
    // NAV ======================================================================= //
    Route::get('/movies/popular', function(){
        return view('movies.popular');
    });
    Route::get('/movies/nowplaying', function(){
        return view('movies.nowplaying');
    });
    Route::get('/movies/upcoming', function(){
        return view('movies.upcoming');
    });
    Route::get('/movies/toprated', function(){
        return view('movies.toprated');
    });
    Route::get('/profile/{id}', 'ProfileController@show');
    Route::get('/profile/{id}/edit', 'ProfileController@edit');
    Route::post('/profile/{id}/update', 'ProfileController@update');
    Route::get('/profile/{id}/stat', 'ProfileController@showStat');
    //=============================================================================//
    // Route::get('/youtube', function(){
    //     return view('youtube.show');
    // });
    // CRUD =======================================================================//
    Route::post('/post/{id}', 'ReviewController@store');
    //=============================================================================//
    Route::get('/movies/{id}/{title}', 'ShowMovieController@show');
    Route::get('/movies/{id}/{title}/similar', 'ShowMovieController@similar');
    Route::post('/register/update', "RegistrationController@store");
    Route::get('/search/{movie}', "ShowMovieController@search");


    //=============================================================================//
    Route::post('/favorite/{id}', 'ShowMovieController@favorite');
    Route::post('/unfavorite/{id}', 'ShowMovieController@unfavorite');
    Route::post('/watched/{id}', 'ShowMovieController@watched');
    Route::post('/unwatched/{id}', 'ShowMovieController@unwatched');
})


?>
