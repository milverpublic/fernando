<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RolApiTest extends TestCase
{
    use MakeRolTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRol()
    {
        $rol = $this->fakeRolData();
        $this->json('POST', '/api/v1/rols', $rol);

        $this->assertApiResponse($rol);
    }

    /**
     * @test
     */
    public function testReadRol()
    {
        $rol = $this->makeRol();
        $this->json('GET', '/api/v1/rols/'.$rol->id);

        $this->assertApiResponse($rol->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRol()
    {
        $rol = $this->makeRol();
        $editedRol = $this->fakeRolData();

        $this->json('PUT', '/api/v1/rols/'.$rol->id, $editedRol);

        $this->assertApiResponse($editedRol);
    }

    /**
     * @test
     */
    public function testDeleteRol()
    {
        $rol = $this->makeRol();
        $this->json('DELETE', '/api/v1/rols/'.$rol->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rols/'.$rol->id);

        $this->assertResponseStatus(404);
    }
}
