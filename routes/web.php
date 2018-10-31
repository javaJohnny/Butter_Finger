<?php

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
//=============================================================================//

// CRUD =======================================================================//
Route::post('/post/{id}', 'ReviewController@store');
//=============================================================================//
Route::get('/movies/{id}/{title}', 'ShowMovieController@show');
Route::get('/movies/{id}/{title}/similar', 'ShowMovieController@similar');
Route::post('/register/update', "RegistrationController@store");

// SESSION ====================================================================//
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/home', function(){
    return view('layouts.home');
});
Route::get('/', function(){
    return view('auth.login');
});
Route::get('/register', function(){
    return view('auth.register');
});
//=============================================================================//

?>
