<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/games', function () {
    return view('games');
});

Route::get('/api/home.json', 'MainController@home');
Route::get('/api/games/{name}/header', 'MainController@game_header');
Route::get('/api/games/{name}/info', 'MainController@game_header');
Route::get('/api/games/{name}/leaderboard', 'MainController@game_leaderboard');
Route::get('/api/games/{name}/comments', 'MainController@game_comments');
Route::get('/api/games/{name}/related_games', 'MainController@game_related');

Route::get('/home', 'HomeController@index');

Auth::routes();