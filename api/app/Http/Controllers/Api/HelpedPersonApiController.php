<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\HelpedPersonResource;
use App\Http\Requests\StoreUpdateHelpedPerson;
use App\Services\HelpedPersonService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class HelpedPersonApiController extends Controller
{
    protected $helpedPersonService;

    public function __construct(HelpedPersonService $helpedPersonService)
    {
        $this->helpedPersonService = $helpedPersonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function all()
    {
        $helpedPerson = $this->helpedPersonService->all();

        return HelpedPersonResource::collection($helpedPerson);
    }

    public function findHelpedPersonById(int $id)
    {
        if ( !$helpedPerson = $this->helpedPersonService
            ->findHelpedPersonById($id)
        ) {
            return response()
                ->json([
                    "error" => "Helped Person not found !"
                    ], Response::HTTP_NOT_FOUND
                );
        }

        return new HelpedPersonResource($helpedPerson);
    }

    public function getAllByLeaderId(int $leaderId)
    {
        if ( !$helpedPersons = $this->helpedPersonService
            ->getAllByLeaderId($leaderId)
        ) {
            return response()
                ->json([
                    "error" => "Helped Person not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }

        return HelpedPersonResource::collection($helpedPersons);
    }

    public function createHelpedPerson(StoreUpdateHelpedPerson $request)
    {
        $newHelpedPerson = $this->helpedPersonService
            ->createHelpedPerson($request->all());

        return new HelpedPersonResource($newHelpedPerson);
    }

    public function delete(int $id)
    {
        if ( !$helpedPersons = $this->helpedPersonService
            ->findHelpedPersonById($id)
        ) {
            return response()
                ->json([
                    "error" => "Helped Person not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }
        $this->helpedPersonService
            ->deleteHelpedPersonById($id);

        return response()->json([], Response::HTTP_OK);
    }

    public function udpateHelpedPerson(StoreUpdateHelpedPerson $request)
    {
        if ( !$helpedPersons = $this->helpedPersonService
            ->findHelpedPersonById((int)$request->id)
        ) {
            return response()->json([
                    "error" => "Helped Person not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }

        $helpedPersonUpdated = $this->helpedPersonService
            ->updateHelpedPerson($request->all());

        return new HelpedPersonResource($helpedPersonUpdated);
    }
}
