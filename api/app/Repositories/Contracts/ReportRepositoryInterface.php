<?php

namespace App\Repositories\Contracts;

use App\Http\Requests\GetReportsLeaders;

interface ReportRepositoryInterface
{
    public function leadersThatHaveDone(GetReportsLeaders $request): array;
    public function leadersThatHaventDone(GetReportsLeaders $request): array;
    public function leadersThatHaveDouble(GetReportsLeaders $request): array;
    public function leadersThatHaveTripleOrMore(GetReportsLeaders $request): array;
}
