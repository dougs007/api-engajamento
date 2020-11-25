<?php

namespace App\Repositories\Contracts;

interface HelpedPersonRepositoryInterface
{
    public function all();
    public function createNewHelpedPerson(array $data);
    public function getHelpedPerson(int $id);
}
