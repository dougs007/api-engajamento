<?php

namespace App\Services;

use App\Repositories\Contracts\LeaderRepositoryInterface;
use App\Entity\Roles as Role;

class LeaderService
{
    protected $leaderRepository;

    public function __construct(LeaderRepositoryInterface $leaderRepository)
    {
        $this->leaderRepository = $leaderRepository;
    }

    public function all()
    {
        return $this->leaderRepository->all();
    }

    public function find(int $id)
    {
        return $this->leaderRepository
            ->find($id);
    }

    public function createLeader(array $data)
    {
        $data["password"] = bcrypt($data["password"]);
        $data = $this->roleTreat($data);

        return $this->leaderRepository
            ->createLeader($data);
    }

    public function updateLeader(array $data)
    {
        # check if password has been past and if has value
        if (array_key_exists('password', $data) && !!$data["password"]) {
            $data["password"] = bcrypt($data["password"]);
        }
        $this->leaderRepository
            ->updateLeader($data);

        return $this->find($data['id']);
    }

    public function deleteLeader(int $id)
    {
        $deletedId = auth()->user()->id;

        return $this->leaderRepository
            ->deleteLeader($id, $deletedId);
    }

    private function roleTreat($data)
    {
        switch ($data["perfil_id"]) {
            case \App\Entity\Roles::ADMIN:
                $data["lider_id"] = null;
                break;
            case \App\Entity\Roles::LEADER:
                break;
        }
        return $data;
    }

    public function allByLeaderId()
    {
        $user = auth()->user();
        $loggedLeaderId = $user->id;
        $isAdmin = $user->perfil_id == Role::ADMIN;

        return $this->leaderRepository
            ->allByLeaderId($loggedLeaderId, $isAdmin);
    }
}
