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
}
