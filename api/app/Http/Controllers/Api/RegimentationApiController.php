<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePersonActivity;
use App\Http\Resources\Api\PersonActivityResource;
use App\Services\PersonActivityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class RegimentationApiController extends Controller
{
    protected $personActivityService;

    public function __construct(PersonActivityService $personActivityService)
    {
        $this->personActivityService = $personActivityService;
    }

    public function createReview(StoreUpdatePersonActivity $request)
    {
        $newReview = $this->personActivityService
            ->createReview($request->all());

        return new PersonActivityResource($newReview);
    }

    public function deleteReview(int $reviewId)
    {
        if ( !$review = $this->personActivityService
            ->findReviewById($reviewId)
        ) {
            return response()
                ->json([
                    "error" => "Review not found !"
                ], Response::HTTP_NOT_FOUND
            );
        }

        $this->personActivityService
            ->deleteReview($reviewId);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
