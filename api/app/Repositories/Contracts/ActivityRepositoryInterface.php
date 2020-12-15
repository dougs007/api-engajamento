<?php

namespace App\Repositories\Contracts;

interface ActivityRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function createActivity(array $data);
    public function updateActivity(array $data);
    public function deleteActivity(int $id);
}
