<?php

namespace App\Repositories\Contracts;

interface ReportRepositoryInterface
{
    public function leadersThatHaveDone();
    public function leadersThatHaveDont();
    public function leadersThatHaveDouble();
    public function leadersThatHaveTripleOrMore();
}
