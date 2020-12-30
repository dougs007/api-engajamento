<?php

namespace App\Services;

use App\Repositories\Contracts\LeaderRepositoryInterface;

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
        # todo finalizar lógica de update salvando deleted_id;
        $data["deleted_id"] = auth()->user()->id;
        $data["deleted_at"] = 'now()';
        $data["id"] = $id;

        return $this->leaderRepository
            ->deleteLeader($id);
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
}
