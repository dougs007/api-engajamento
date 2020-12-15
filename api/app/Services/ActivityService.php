<?php

namespace App\Services;

use App\Repositories\Contracts\ActivityRepositoryInterface;

class ActivityService
{
    protected $activityRepository;

    public function __construct(ActivityRepositoryInterface $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function all()
    {
        return $this->activityRepository->all();
    }

    public function find(int $id)
    {
        return $this->activityRepository
            ->find($id);
    }

    public function createActivity(array $data)
    {
        return $this->activityRepository
            ->createActivity($data);
    }

    public function updateActivity(array $data)
    {
        $this->activityRepository
            ->updateActivity($data);

        return $this->find($data['id']);
    }

    public function deleteActivity(int $id)
    {
        return $this->activityRepository
            ->deleteActivity($id);
    }
}
