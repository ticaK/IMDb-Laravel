<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    { 
        $genres = ['drama','comedy','thriller','crime','fantasy','action','horor','western'];
        foreach($genres as $genre){
            factory(App\Genre::class,1)->create([
                'name'=>$genre
            ]);
        }
    }     
}