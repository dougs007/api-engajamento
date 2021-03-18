<?php

namespace App\Services;

use App\Http\Requests\GetReportsLeaders;
use App\Repositories\Contracts\ReportRepositoryInterface;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function leadersThatHaveDone(GetReportsLeaders $request): array
    {
        return $this->reportRepository->leadersThatHaveDone($request);
    }

    public function leadersThatHaventDone(GetReportsLeaders $request): array
    {
        return $this->reportRepository->leadersThatHaventDone($request);
    }

    public function leadersThatHaveDouble(GetReportsLeaders $request): array
    {
        return $this->reportRepository->leadersThatHaveDouble($request);
    }

    public function leadersThatHaveTripleOrmore(GetReportsLeaders $request): array
    {
        return $this->reportRepository->leadersThatHaveTripleOrmore($request);
    }
}
