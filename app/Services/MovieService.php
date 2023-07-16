<?php

namespace App\Services;

use App\Models\Movie;
use App\Repositories\MovieRepository;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MovieService
{
    protected MovieRepository $movieRepository;
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAsPaginated()
    {
        return $this->movieRepository->paginated();
    }

    public function getModelById($id)
    {
        $model = $this->movieRepository->find($id);
        if (! $model) throw new NotFoundHttpException();

        return $model;
    }

    /**
     * @throws \Exception
     */
    public function store(array $data)
    {
        DB::beginTransaction();

        try {
            if (isset($data['poster'])) {
                $posterPath = $data['poster']->store('public/uploads/posters');
                $data['poster'] = $posterPath;
            }
            if (!isset($data['genres'])) throw new NotFoundHttpException();
            $selectedGenres = $data['genres'];
            $movie = $this->movieRepository->create($data);
            $movie->genres()->attach($selectedGenres);
            DB::commit();
            return $movie;
        }
        catch (\Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @throws \Exception
     */
    public function update($id, array $data)
    {
        DB::beginTransaction();

        try {
            $movie = $this->movieRepository->update($id,$data);
            DB::commit();
            return $movie;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy($id)
    {
        return $this->movieRepository->destroy($id);
    }

    public function publish(Movie $movie)
    {
        $movie->update(['is_published'=>true]);

        return $movie;
    }




}
