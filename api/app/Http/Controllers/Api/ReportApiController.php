<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ActivityResource;
use App\Http\Requests\StoreUpdateActivity;
use App\Services\ReportService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class ReportApiController extends Controller
{
    protected $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function leadersThatHaveDone()
    {
        $activity = $this->reportService->leadersThatHaveDone();

//        return new ActivityResource($activity);
        return response()->json($activity, Response::HTTP_OK);
    }

}
