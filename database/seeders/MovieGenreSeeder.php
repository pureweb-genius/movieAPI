<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie1 = Movie::find(1);
        $movie2 = Movie::find(2);
        $genre1 = Genre::find(1);
        $genre2 = Genre::find(2);

        $movie1->genres()->attach([$genre1->id, $genre2->id]);
        $movie2->genres()->attach([$genre2->id]);
    }
}
