<?php

namespace Src\General\Club\Presentation\HTTP;

use Illuminate\Http\JsonResponse;
use Src\Common\Infrastructure\Laravel\Controller;
use Src\General\Club\Application\Mappers\ClubMapper;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Src\General\Club\Application\UseCases\Command\StoreClubCommand;

class ClubController extends Controller 
{
    public function index(): JsonResponse
    {
        return response()->json(['data' => 'Data is now here'], Response::HTTP_ACCEPTED);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $user_id = auth()->user()->id;
            $clubData = ClubMapper::fromRequest($request, $user_id);
            $club = (new StoreClubCommand($clubData, $user_id))->execute();
            return response()->json($club->toArray(), Response::HTTP_CREATED);
        } catch (\DomainException $ex) {
            return response()->error($ex->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

}
