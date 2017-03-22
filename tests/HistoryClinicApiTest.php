<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistoryClinicApiTest extends TestCase
{
    use MakeHistoryClinicTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHistoryClinic()
    {
        $historyClinic = $this->fakeHistoryClinicData();
        $this->json('POST', '/api/v1/historyClinics', $historyClinic);

        $this->assertApiResponse($historyClinic);
    }

    /**
     * @test
     */
    public function testReadHistoryClinic()
    {
        $historyClinic = $this->makeHistoryClinic();
        $this->json('GET', '/api/v1/historyClinics/'.$historyClinic->id);

        $this->assertApiResponse($historyClinic->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHistoryClinic()
    {
        $historyClinic = $this->makeHistoryClinic();
        $editedHistoryClinic = $this->fakeHistoryClinicData();

        $this->json('PUT', '/api/v1/historyClinics/'.$historyClinic->id, $editedHistoryClinic);

        $this->assertApiResponse($editedHistoryClinic);
    }

    /**
     * @test
     */
    public function testDeleteHistoryClinic()
    {
        $historyClinic = $this->makeHistoryClinic();
        $this->json('DELETE', '/api/v1/historyClinics/'.$historyClinic->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/historyClinics/'.$historyClinic->id);

        $this->assertResponseStatus(404);
    }
}
