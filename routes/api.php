<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
    Route::post('register', 'Auth\RegisterController@create');
});

Route::apiResource('movies', 'Api\MovieController');
Route::post('add', 'Api\MovieController@addUser');
Route::get('genres','Api\MovieController@getAllGenres');
Route::post('movies/{id}/addComment', 'Api\CommentsController@store');
Route::get('popular', 'Api\MovieController@getPopular');
Route::get('movies/{id}/related', 'Api\MovieController@getRelated');
Route::apiResource('watchlists','Api\WatchlistsController');
