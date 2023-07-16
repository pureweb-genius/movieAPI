<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Services\MovieService;

class MovieController extends Controller
{
    private MovieService $movieService;
    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        return $this->movieService->getAsPaginated();
    }

    public function show($id)
    {
        return $this->movieService->getModelById($id);
    }

    /**
     * @throws \Exception
     */
    public function store(MovieRequest $request)
    {
        return $this->movieService->store($request->all());
    }

    /**
     * @throws \Exception
     */
    public function update(MovieRequest $request, $id)
    {
        return $this->movieService->update($request->validated(),$id);
    }

    public function destroy($id)
    {
        return $this->movieService->destroy($id);
    }

    public function publish(Movie $movie)
    {
        return $this->movieService->publish($movie);
    }

}
