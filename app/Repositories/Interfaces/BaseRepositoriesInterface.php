<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoriesInterface
{
    public function all();
    public function findById(string $id);
}
