<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class WatchlistsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return auth()->user()->watchMovies;
    }

    public function store(Request $request)
    {
        $movie = Movie::find($request->movie_id);
        $movie->watchUsers()->attach(auth()->user()->id);
    }

    public function update(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        Movie::find($id)
             ->watchUsers()
             ->updateExistingPivot($user_id,['watched' => $request->watched]);
    }
        
    public function destroy($movieId)
    {
        auth()->user()->watchMovies()->detach($movieId);
        return $this->index();
    }
}