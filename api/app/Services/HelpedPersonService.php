<?php

namespace App\Services;

use App\Repositories\Contracts\HelpedPersonRepositoryInterface;

class HelpedPersonService
{
    protected $helpedPersonRepository;

    public function __construct(HelpedPersonRepositoryInterface $helpedPersonRepository)
    {
        $this->helpedPersonRepository = $helpedPersonRepository;
    }

    public function all()
    {
        return $this->helpedPersonRepository->all();
    }

    public function findHelpedPersonById(int $id)
    {
        return $this->helpedPersonRepository
            ->find($id);
    }

    public function getAllByLeaderId(int $leaderId)
    {
        return $this->helpedPersonRepository
            ->getAllByLeaderId($leaderId);
    }

    public function createHelpedPerson(array $data)
    {
        return $this->helpedPersonRepository
            ->createHelpedPerson($data);
    }

    public function deleteHelpedPersonById(int $id)
    {
        if (
            ! $helpedPerson = $this->findHelpedPersonById($id)
        ) {
            return ;
        }

        return $this->helpedPersonRepository
            ->deleteHelpedPersonById($id);
    }
}
