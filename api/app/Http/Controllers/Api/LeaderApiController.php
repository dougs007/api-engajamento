<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\LeaderResource;
use App\Http\Requests\StoreUpdateLeader;
use App\Services\LeaderService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class LeaderApiController extends Controller
{
    protected $leaderService;

    public function __construct(LeaderService $leaderService)
    {
        $this->leaderService = $leaderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function all()
    {
        $leader = $this->leaderService->all();

        return LeaderResource::collection($leader);
    }

    public function findLeaderById(int $id)
    {
        if ( !$leader = $this->leaderService
            ->find($id)
        ) {
            return response()
                ->json([
                    "error" => "Leader not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }

        return new LeaderResource($leader);
    }

    public function createLeader(StoreUpdateLeader $request)
    {
        $newLeader = $this->leaderService
            ->createLeader($request->all());

        return new LeaderResource($newLeader);
    }

    public function updateLeader(StoreUpdateLeader $request)
    {
        if ( !$leader = $this->leaderService
            ->find((int)$request->route("leaderId"))
        ) {
            return response()->json(
                ["error" => "Leader not found !"], Response::HTTP_NOT_FOUND
            );
        }
        $data = $request->toArray();
        $data["id"] = $request->route("leaderId");

        $leaderUpdated = $this->leaderService
            ->updateLeader($data);

        return new LeaderResource($leaderUpdated);
    }

    public function delete(int $id)
    {

        if ( !$leader = $this->leaderService
            ->find($id)
        ) {
            return response()
                ->json([
                    "error" => "Leader not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }
        $this->leaderService
            ->deleteLeader($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
