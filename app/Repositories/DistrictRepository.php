<?php

namespace App\Repositories;
use App\Repositories\Interfaces\DistrictRepositoriesInterface;
use App\Repositories\BaseRepository;
use App\Models\District;
class DistrictRepository extends BaseRepository implements DistrictRepositoriesInterface
{
    /**
     * Get all District.
     *
     * @return array
     */
    protected $model;
    public function __construct(
        District $model,
    ){
        $this->model = $model;
    }
    public function findDistrictByProvinceId(int $province_id){
        return $this->model->where('province_code','=',$province_id)->get();
    }
}