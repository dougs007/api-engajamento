<?php

namespace App\Repositories\Contracts;

interface HelpedPersonRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function getAllByLeaderId(int $leaderId);
    public function createHelpedPerson(array $data);
    public function deleteHelpedPerson(int $id);
    public function updateHelpedPerson(array $data);
}
