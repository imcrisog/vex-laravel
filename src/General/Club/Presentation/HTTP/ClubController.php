<?php

namespace Src\General\Club\Presentation\HTTP;

use Illuminate\Http\JsonResponse;
use Src\Common\Infrastructure\Laravel\Controller;
use Symfony\Component\HttpFoundation\Response;

class ClubController extends Controller 
{
    public function index(): JsonResponse
    {
        return response()->json(['data' => 'Data is now here'], Response::HTTP_ACCEPTED);
    }
}
