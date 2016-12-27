<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRolApiTest extends TestCase
{
    use MakeUserRolTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUserRol()
    {
        $userRol = $this->fakeUserRolData();
        $this->json('POST', '/api/v1/userRols', $userRol);

        $this->assertApiResponse($userRol);
    }

    /**
     * @test
     */
    public function testReadUserRol()
    {
        $userRol = $this->makeUserRol();
        $this->json('GET', '/api/v1/userRols/'.$userRol->id);

        $this->assertApiResponse($userRol->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUserRol()
    {
        $userRol = $this->makeUserRol();
        $editedUserRol = $this->fakeUserRolData();

        $this->json('PUT', '/api/v1/userRols/'.$userRol->id, $editedUserRol);

        $this->assertApiResponse($editedUserRol);
    }

    /**
     * @test
     */
    public function testDeleteUserRol()
    {
        $userRol = $this->makeUserRol();
        $this->json('DELETE', '/api/v1/userRols/'.$userRol->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/userRols/'.$userRol->id);

        $this->assertResponseStatus(404);
    }
}
