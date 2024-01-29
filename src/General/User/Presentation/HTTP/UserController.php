<?php

namespace Src\General\User\Presentation\HTTP;

use Illuminate\Http\JsonResponse;
use Src\Common\Domain\Exceptions\UnauthorizedUserException;
use Src\Common\Infrastructure\Laravel\Controller;
use Src\General\User\Application\UseCases\Queries\FindUserByIdQuery;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function show(string $id): JsonResponse
    {
        try {
            return response()->success((new FindUserByIdQuery($id))->handle());
        } catch (UnauthorizedUserException $e) {
            return response()->error($e->getMessage(), Response::HTTP_UNAUTHORIZED);   
        }
    }
}