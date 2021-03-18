<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetReportsLeaders;
use App\Services\ReportService;
use Symfony\Component\HttpFoundation\Response;

class ReportApiController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function leadersThatHaveDone(GetReportsLeaders $request): \Illuminate\Http\JsonResponse
    {
        $leaders = $this->reportService->leadersThatHaveDone($request);

        return response()->json($leaders, Response::HTTP_OK);
    }

    public function leadersThatHaventDone(GetReportsLeaders $request): \Illuminate\Http\JsonResponse
    {
        $leaders = $this->reportService->leadersThatHaventDone($request);

        return response()->json($leaders, Response::HTTP_OK);
    }

    public function leadersThatHaveDouble(GetReportsLeaders $request): \Illuminate\Http\JsonResponse
    {
        $leaders = $this->reportService->leadersThatHaveDouble($request);

        return response()->json($leaders, Response::HTTP_OK);
    }

    public function leadersThatHaveTripleOrmore(GetReportsLeaders $request): \Illuminate\Http\JsonResponse
    {
        $leaders = $this->reportService->leadersThatHaveTripleOrmore($request);

        return response()->json($leaders, Response::HTTP_OK);
    }
}
