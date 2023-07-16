<?php

namespace App\Services;

use App\Models\Genre;
use App\Repositories\GenreRepository;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GenreService
{
   protected GenreRepository $genreRepository;
   public function __construct(GenreRepository $genreRepository)
   {
       $this->genreRepository = $genreRepository;
   }

   public function getAsPaginated()
   {
       return $this->genreRepository->paginated();
   }

   public function getModelById($id)
   {
       $model = $this->genreRepository->find($id);
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
           $genre = $this->genreRepository->create($data);
           DB::commit();
           return $genre;
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
           $genre = $this->genreRepository->update($id,$data);
           DB::commit();
           return $genre;
       }
       catch (\Exception $e)
       {
           DB::rollBack();
           throw $e;
       }
   }

   public function destroy($id)
   {
       return $this->genreRepository->destroy($id);
   }


}
