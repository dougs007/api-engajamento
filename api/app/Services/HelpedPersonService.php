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
        return $this->helpedPersonRepository
            ->deleteHelpedPersonById($id);
    }

    public function updateHelpedPerson(array $data)
    {
        $this->helpedPersonRepository
            ->updateHelpedPerson($data);

        return $this->findHelpedPersonById($data['id']);
    }
}
