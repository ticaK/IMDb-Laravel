<?php

namespace App;
use App\Movie;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
