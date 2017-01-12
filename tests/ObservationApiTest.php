<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObservationApiTest extends TestCase
{
    use MakeObservationTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateObservation()
    {
        $observation = $this->fakeObservationData();
        $this->json('POST', '/api/v1/observations', $observation);

        $this->assertApiResponse($observation);
    }

    /**
     * @test
     */
    public function testReadObservation()
    {
        $observation = $this->makeObservation();
        $this->json('GET', '/api/v1/observations/'.$observation->id);

        $this->assertApiResponse($observation->toArray());
    }

    /**
     * @test
     */
    public function testUpdateObservation()
    {
        $observation = $this->makeObservation();
        $editedObservation = $this->fakeObservationData();

        $this->json('PUT', '/api/v1/observations/'.$observation->id, $editedObservation);

        $this->assertApiResponse($editedObservation);
    }

    /**
     * @test
     */
    public function testDeleteObservation()
    {
        $observation = $this->makeObservation();
        $this->json('DELETE', '/api/v1/observations/'.$observation->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/observations/'.$observation->id);

        $this->assertResponseStatus(404);
    }
}
