<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PacientApiTest extends TestCase
{
    use MakePacientTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePacient()
    {
        $pacient = $this->fakePacientData();
        $this->json('POST', '/api/v1/pacients', $pacient);

        $this->assertApiResponse($pacient);
    }

    /**
     * @test
     */
    public function testReadPacient()
    {
        $pacient = $this->makePacient();
        $this->json('GET', '/api/v1/pacients/'.$pacient->id);

        $this->assertApiResponse($pacient->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePacient()
    {
        $pacient = $this->makePacient();
        $editedPacient = $this->fakePacientData();

        $this->json('PUT', '/api/v1/pacients/'.$pacient->id, $editedPacient);

        $this->assertApiResponse($editedPacient);
    }

    /**
     * @test
     */
    public function testDeletePacient()
    {
        $pacient = $this->makePacient();
        $this->json('DELETE', '/api/v1/pacients/'.$pacient->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pacients/'.$pacient->id);

        $this->assertResponseStatus(404);
    }
}
