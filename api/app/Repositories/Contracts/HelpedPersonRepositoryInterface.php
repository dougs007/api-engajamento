<?php

namespace App\Repositories\Contracts;

interface HelpedPersonRepositoryInterface
{
    public function createNewHelpedPerson(array $data);
    public function getHelpedPerson(int $id);
    public function all();
}
