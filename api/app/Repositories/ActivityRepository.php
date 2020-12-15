<?php

namespace App\Repositories;

use App\Entity\Activity;
use App\Repositories\Contracts\ActivityRepositoryInterface;

class ActivityRepository implements ActivityRepositoryInterface
{
    protected $entity;

    public function __construct(Activity $activity)
    {
        $this->entity = $activity;
    }

    public function all()
    {
        return $this->entity->all();
    }

    public function find(int $id)
    {
        return $this->entity
            ->find($id);
    }

    public function createActivity(array $data)
    {
        return $this->entity->create($data);
    }

    public function updateActivity(array $data)
    {
        return $this->find($data['id'])->update($data);
    }

    public function deleteActivity(int $id)
    {
        return $this->find($id)->delete();
    }
}
