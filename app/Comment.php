<?php

namespace App;

use App\Movie;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'movie_id', 'user_id'];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
