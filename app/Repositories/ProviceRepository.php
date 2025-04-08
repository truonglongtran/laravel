<?php

namespace App\Repositories;
use App\Repositories\Interfaces\ProviceRepositoriesInterface;
use App\Repositories\BaseRepository;
use App\Models\Provice;
class ProviceRepository extends BaseRepository implements ProviceRepositoriesInterface
{
    /**
     * Get all provinces.
     *
     * @return array
     */
    protected $model;
    public function __construct(
        Provice $model,
    ){
        $this->model = $model;
    }
}