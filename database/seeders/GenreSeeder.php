<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Genre::create(['name' => 'Action']);
        Genre::create(['name' => 'Drama']);
        Genre::create(['name' => 'Comedy']);
    }
}
