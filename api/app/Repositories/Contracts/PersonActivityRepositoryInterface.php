<?php

namespace App\Repositories\Contracts;

interface PersonActivityRepositoryInterface
{
    public function createReview(array $data);
    public function findReviewById(int $id);
    public function deleteReview(int $id);
    public function getRegimentation(array $data);
}
