<?php

namespace App\Repositories;

use App\Entity\User as Leader;
use App\Repositories\Contracts\LeaderRepositoryInterface;

class LeaderRepository implements LeaderRepositoryInterface
{
    protected $entity;

    public function __construct(Leader $leader)
    {
        $this->entity = $leader;
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

    public function createLeader(array $data)
    {
        return $this->entity->create($data);
    }

    public function updateLeader(array $data)
    {
        return $this->find($data['id'])->update($data);
    }

    public function deleteLeader(int $id, int $deletedId)
    {
        $leader = $this->find($id);
        $leader->deleted_id = $deletedId;
        $leader->deleted_at = \Carbon\Carbon::now();
        $leader->save();
    }

    /**
     * Get logged in leader and the leaders of this leader.
     *
     * @param int $loggedLeaderId
     * @param bool $isAdmin
     * @return mixed
     */
    public function allByLeaderId(int $loggedLeaderId, bool $isAdmin)
    {
        return $this->entity
            ->where(function($query) use ($isAdmin, $loggedLeaderId) {
                if (!$isAdmin) {
                    $query->where("lider_id", "=", $loggedLeaderId);
                    $query->orWhere("id", "=", $loggedLeaderId);
                }
            })
            ->orderBy("tx_nome", "asc")
            ->get();
    }
}
