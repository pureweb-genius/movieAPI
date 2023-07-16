<?php

namespace App\Repositories;

use App\Models\Genre;

class GenreRepository extends BaseRepository
{
    protected $model;
    public function __construct(Genre $model)
    {
        $this->model = $model;
    }

}
