<?php

namespace App\Repositories;

use App\Models\Movie;

class MovieRepository extends BaseRepository
{
    protected $model;
    public function __construct(Movie $model)
    {
        $this->model = $model;
    }

}
