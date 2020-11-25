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
        return $this->entity->all();
    }

    public function createNewHelpedPerson(array $data)
    {
        $data['password'] = bcrypt($data['password']);

//        return $this->entity->create($data);
    }

    public function getHelpedPerson(int $id)
    {

    }
}
