<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\User;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'image_url', 'genre_id', 'likes', 'dislikes','views'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'movies_users');
    }
    
    public static function search($searchTerm) {
        $query = Movie::query();
        if ($searchTerm) {
            $query->where('title','like','%'.$searchTerm.'%');  
        }

        return $query;
    }
}
