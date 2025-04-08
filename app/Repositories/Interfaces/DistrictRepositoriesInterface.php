<?php

namespace App\Repositories\Interfaces;

interface DistrictRepositoriesInterface
{
    /**
     * Get all provinces.
     *
     * @return mixed
     */
    public function all();
    public function findDistrictByProvinceId(int $province_id);
}