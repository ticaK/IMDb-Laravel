<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Genre;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index(Request $request)
    {
        $title = $request->input('title');
        $genre = $request->input('genre');
        $query = Movie::search($title);

        if($genre){
           $query->join('genres', 'movies.genre_id', '=', 'genres.id')
           ->select('movies.id as id', 'movies.*', 'genres.name')
           ->where('genres.name', '=', $genre);
        }

        return $query->with(['users'])->paginate(10);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Movie::with(['genre','users'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return Movie::with(['genre','users'])->findOrFail($id);
    }

    public function destroy($id)
    {
        //
    }

    public function addUser(Request $request)
    {
        $movie = Movie::find($request->movie_id);
        $movie->users()->attach($request->user_id);
    }

    public function getAllGenres() {
        return Genre::select('name')->get();      
    }
}