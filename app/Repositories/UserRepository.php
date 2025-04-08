<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoriesInterface;
use App\Repositories\BaseRepository;
class UserRepository extends BaseRepository implements UserRepositoriesInterface
{
    protected $model;
    public function __construct(User $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }
    public function getAllPaginate()
    {
        return User::paginate(15);
    }
}