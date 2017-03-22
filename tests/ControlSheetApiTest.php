<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControlSheetApiTest extends TestCase
{
    use MakeControlSheetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateControlSheet()
    {
        $controlSheet = $this->fakeControlSheetData();
        $this->json('POST', '/api/v1/controlSheets', $controlSheet);

        $this->assertApiResponse($controlSheet);
    }

    /**
     * @test
     */
    public function testReadControlSheet()
    {
        $controlSheet = $this->makeControlSheet();
        $this->json('GET', '/api/v1/controlSheets/'.$controlSheet->id);

        $this->assertApiResponse($controlSheet->toArray());
    }

    /**
     * @test
     */
    public function testUpdateControlSheet()
    {
        $controlSheet = $this->makeControlSheet();
        $editedControlSheet = $this->fakeControlSheetData();

        $this->json('PUT', '/api/v1/controlSheets/'.$controlSheet->id, $editedControlSheet);

        $this->assertApiResponse($editedControlSheet);
    }

    /**
     * @test
     */
    public function testDeleteControlSheet()
    {
        $controlSheet = $this->makeControlSheet();
        $this->json('DELETE', '/api/v1/controlSheets/'.$controlSheet->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/controlSheets/'.$controlSheet->id);

        $this->assertResponseStatus(404);
    }
}
