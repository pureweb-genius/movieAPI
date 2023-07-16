<?php


namespace App\Repositories;

use Exception;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BaseRepository
{
    public $sortBy = 'created_at';
    public $sortOrder = 'asc';

    protected $model;


    public function getModel()
    {
        return $this->model;
    }

    public function paginated($paginate = 10)
    {
        return $this
            ->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->paginate($paginate);
    }


    public function create($input)
    {
        $model = new $this->model;
        $model->fill($input);
        $model->save();
        return $model;
    }

    public function find($id)
    {
        return $this->getModel()->find($id);
    }


    public function destroy($id)
    {
        $model = $this->find($id);
        if (!$model) throw new NotFoundHttpException();

        return $model->delete();
    }

    public function update($id, array $input)
    {
        $model = $this->find($id);
        if (! $model) throw new NotFoundHttpException();

        $model->fill($input);
        $model->save();

        return $model;
    }

}
