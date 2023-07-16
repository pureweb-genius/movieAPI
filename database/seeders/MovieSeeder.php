<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::insert([
            ['name' => 'Movie 1', 'is_published' => true, 'poster' => 'poster1.jpg'],
            ['name' => 'Movie 2', 'is_published' => false, 'poster' => 'poster2.jpg'],
        ]);
    }
}
