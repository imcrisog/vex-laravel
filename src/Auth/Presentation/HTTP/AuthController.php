<?php

namespace Src\Auth\Presentation\HTTP;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Src\Auth\Domain\AuthInterface;
use Src\Common\Domain\Exceptions\RequiredException;
use Src\Common\Infrastructure\Laravel\Controller;
use Src\General\User\Application\Mappers\UserMapper;
use Src\General\User\Domain\Model\ValueObjects\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private AuthInterface $auth;

    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $user = UserMapper::fromRequest($request);
            $password = new Password($request->password, $request->password_confirmation);
            $token = $this->auth->register($user, $password);
            return $this->respondWithToken($token);
        } catch (\DomainException $domain) {
            return response()->json($domain->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $email = $request->get('email');
            $password = $request->get('password');

            $credentials = ['email' => $email, 'password' => $password];
            $validation = Validator::make($credentials, [
                'email' => ['required', 'email'],
                'password' => ['required', 'string']
            ]);

            if ($validation->fails()) {
                throw new ValidationException($validation);
            }

            $token = $this->auth->login($credentials);
            return $this->respondWithToken($token);
        } catch (ValidationException $exception) { 
            return response()->json($exception->errors(), Response::HTTP_BAD_REQUEST);
        } catch (AuthenticationException) {
            return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function refresh(): JsonResponse
    {
        try {
            $token = $this->auth->refresh();
        } catch (AuthenticationException $e) {
            return response()->json(['status' => $e->getMessage()], Response::HTTP_FORBIDDEN);
        }

        return $this->respondWithToken($token);
    }

    public function me(): JsonResponse
    {
        return response()->json($this->auth->me()->toArray());
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'accessToken' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 1
        ]);
    }
}