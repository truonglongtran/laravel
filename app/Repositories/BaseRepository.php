<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoriesInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoriesInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function create(array $payload){
        $model=$this->model->create($payload);
        return $model->fresh();
    }

    public function all(){
        return $this->model->all();
    }

    public function findById(
        string $id,
        array $column = ['*'],
        array $relation = []
    ){
        return $this->model
            ->select($column)
            ->with($relation)
            ->where($this->model->getKeyName(), $id)
            ->firstOrFail();
    }
}
