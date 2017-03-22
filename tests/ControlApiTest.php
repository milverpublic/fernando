<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControlApiTest extends TestCase
{
    use MakeControlTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateControl()
    {
        $control = $this->fakeControlData();
        $this->json('POST', '/api/v1/controls', $control);

        $this->assertApiResponse($control);
    }

    /**
     * @test
     */
    public function testReadControl()
    {
        $control = $this->makeControl();
        $this->json('GET', '/api/v1/controls/'.$control->id);

        $this->assertApiResponse($control->toArray());
    }

    /**
     * @test
     */
    public function testUpdateControl()
    {
        $control = $this->makeControl();
        $editedControl = $this->fakeControlData();

        $this->json('PUT', '/api/v1/controls/'.$control->id, $editedControl);

        $this->assertApiResponse($editedControl);
    }

    /**
     * @test
     */
    public function testDeleteControl()
    {
        $control = $this->makeControl();
        $this->json('DELETE', '/api/v1/controls/'.$control->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/controls/'.$control->id);

        $this->assertResponseStatus(404);
    }
}
