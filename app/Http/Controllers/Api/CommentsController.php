<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function store(CreateCommentRequest $request, $id) {
        $newComment =  Comment::create([
            'text' => $request->text,
            'user_id' => auth()->user()->id,
            'movie_id' => $id
        ]);

       return Comment::with('user')->find($newComment->id);
    } 
}