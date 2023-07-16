<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use App\Services\GenreService;

class GenreController extends Controller
{
    private GenreService $genreService;
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {
        return $this->genreService->getAsPaginated();
    }

    public function show($id)
    {
        return $this->genreService->getModelById($id);
    }

    /**
     * @throws \Exception
     */
    public function store(GenreRequest $request)
    {
        return $this->genreService->store($request->validated());
    }

    public function update($id,GenreRequest $request)
    {
        return $this->genreService->update($id,$request->validated());
    }

    public function destroy($id)
    {
        return $this->genreService->destroy($id);
    }

    public function movies(Genre $genre)
    {
        $movies = $genre->movies()->paginate(10);

        return response()->json($movies);
    }

}
