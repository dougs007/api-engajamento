<?php

namespace App\Services;

use App\Repositories\Contracts\ReportRepositoryInterface;

class ReportService
{
    protected $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function leadersThatHaveDone()
    {
        return $this->reportRepository->leadersThatHaveDone();
    }
}
