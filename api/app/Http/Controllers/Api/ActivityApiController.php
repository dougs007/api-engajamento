<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ActivityResource;
use App\Http\Requests\StoreUpdateActivity;
use App\Services\ActivityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class ActivityApiController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function all()
    {
        $activity = $this->activityService->all();

        return ActivityResource::collection($activity);
    }

    public function findActivityById(int $id)
    {
        if ( !$activity = $this->activityService
            ->find($id)
        ) {
            return response()
                ->json([
                    "error" => "Activity not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }

        return new ActivityResource($activity);
    }

    public function createActivity(StoreUpdateActivity $request)
    {
        $newActivity = $this->activityService
            ->createActivity($request->all());

        return new ActivityResource($newActivity);
    }

    public function updateActivity(StoreUpdateActivity $request)
    {
        if ( !$activity = $this->activityService
            ->find((int)$request->route("activityId"))
        ) {
            return response()->json(
                ["error" => "Activity not found !"], Response::HTTP_NOT_FOUND
            );
        }
        $data = $request->toArray();
        $data["id"] = $request->route("activityId");

        $activityUpdated = $this->activityService
            ->updateActivity($data);

        return new ActivityResource($activityUpdated);
    }

    public function delete(int $id)
    {
        if ( !$activity = $this->activityService
            ->find($id)
        ) {
            return response()
                ->json([
                    "error" => "Activity not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }
        $this->activityService
            ->deleteActivity($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
