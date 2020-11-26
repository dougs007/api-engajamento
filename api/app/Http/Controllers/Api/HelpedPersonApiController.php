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

    public function createHelpedPerson(Request $request)
    {
        // Validate data
        $validator = Validator::make($request->all(), [
            "lider_id"      => "required",
            "tx_nome"       => "required|max:100",
            "dt_nascimento" => "required|date",
            "nu_telefone"   => "required",
            "nu_ddd"        => "required",
        ]
/*             [
                'title.required' => 'Enter Title Post! ',
                'content.required' => 'Enter Content Post !',
            ] */
        );
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill in the blank fields',
                'data'    => $validator->errors()
            ], 400);
        } else {
            $newHelpedPerson = $this->helpedPersonService
                ->createHelpedPerson($request->all());

            return new HelpedPersonResource($newHelpedPerson);
        }
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

        return response()->json([], 200);
    }
}
