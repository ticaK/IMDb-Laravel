<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;

class Movie extends Model
{
    protected $fillable = ['title', 'description', 'image_url', 'genre_id', 'likes', 'dislikes'];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }
    
    public static function search($searchTerm) {
        $query = Movie::query();
        if ($searchTerm) {
            $query->where('title','like','%'.$searchTerm.'%');  
        }

        return response()->json([
            'movies' => $query->paginate(10)
        ]);
    }
}
