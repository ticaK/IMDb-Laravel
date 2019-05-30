<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class MovieController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index(Request $request)
    {
        $title = $request->input('title');
        
        return Movie::search($title);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Movie::with(['genre'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        
        return $movie;
    }

    public function destroy($id)
    {
        //
    }
}
