<?php

namespace App\Repositories\Contracts;

interface LeaderRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function createLeader(array $data);
    public function updateLeader(array $data);
    public function deleteLeader(int $id, int $deletedId);
}
