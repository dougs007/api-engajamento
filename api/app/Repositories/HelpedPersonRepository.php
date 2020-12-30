<?php

namespace App\Repositories;

use App\Entity\HelpedPerson;
use App\Repositories\Contracts\HelpedPersonRepositoryInterface;

class HelpedPersonRepository implements HelpedPersonRepositoryInterface
{
    protected $entity;

    public function __construct(HelpedPerson $helpedPerson)
    {
        $this->entity = $helpedPerson;
    }

    public function all()
    {
        return $this->entity
            ->orderBy("tx_nome", "ASC")
            ->get();
    }

    public function find(int $id)
    {
        return $this->entity
            ->find($id);
    }

    public function getAllByLeaderId(int $leaderId)
    {
        return $this->entity
            ->where("lider_id", "=", $leaderId)
            ->get();
    }

    public function createHelpedPerson(array $data)
    {
        return $this->entity->create($data);
    }

    public function deleteHelpedPerson(int $id, int $deletedId)
    {
        $helpedPerson = $this->find($id);
        $helpedPerson->deleted_id = $deletedId;
        $helpedPerson->deleted_at = \Carbon\Carbon::now();
        $helpedPerson->save();
    }

    public function updateHelpedPerson(array $data)
    {
        return $this->find($data['id'])->update($data);
    }
}
