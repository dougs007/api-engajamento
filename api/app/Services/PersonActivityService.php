<?php

namespace App\Services;

use App\Repositories\Contracts\PersonActivityRepositoryInterface;

class PersonActivityService
{
    protected $personActivityRepository;

    public function __construct(PersonActivityRepositoryInterface $personActivityRepository)
    {
        $this->personActivityRepository = $personActivityRepository;
    }

    public function createReview(array $data)
    {
        return $this->personActivityRepository
            ->createReview($data);
    }

    public function findReviewById(int $id)
    {
        return $this->personActivityRepository
            ->findReviewById($id);
    }

    public function deleteReview(int $id)
    {
        return $this->personActivityRepository
            ->deleteReview($id);
    }

    public function getRegimentation(array $data)
    {
        return $this->personActivityRepository
            ->getRegimentation($data);
    }
}
