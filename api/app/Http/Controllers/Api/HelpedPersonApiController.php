<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HelpedPersonResource;
use App\Services\HelpedPersonService;
use Illuminate\Http\Request;

class HelpedPersonApiController extends Controller
{
    protected $helpedPersonService;

    public function __construct(HelpedPersonService $helpedPersonService)
    {
        $this->helpedPersonService = $helpedPersonService;
    }

    /**
     * Display a listing of the resource.     *
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $helpedPersons = $this->helpedPersonService->all();

        return HelpedPersonResource::collection($helpedPersons);
    }
}
