<?php

namespace Tests\Feature;

use Tests\TestCase;

use Symfony\Component\HttpFoundation\Response;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_register_without_name_returns_error(): void
    {
        $response = $this->postJson('auth/register', [
            'email' => 'test@testuser.com',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
