<?php

namespace App\Repositories;

use App\Entity\PersonActivity;
use App\Repositories\Contracts\PersonActivityRepositoryInterface;

class PersonActivityRepository implements PersonActivityRepositoryInterface
{
    protected $entity;

    public function __construct(PersonActivity $personActivity)
    {
        $this->entity = $personActivity;
    }

    public function createReview(array $data)
    {
        return $this->entity->create($data);
    }

    public function findReviewById(int $id)
    {
        return $this->entity
            ->find($id);
    }

    public function deleteReview(int $id)
    {
        return $this->entity
            ->destroy($id);
    }
}
