<?php

use App\Models\HistoryClinic;
use App\Repositories\HistoryClinicRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistoryClinicRepositoryTest extends TestCase
{
    use MakeHistoryClinicTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HistoryClinicRepository
     */
    protected $historyClinicRepo;

    public function setUp()
    {
        parent::setUp();
        $this->historyClinicRepo = App::make(HistoryClinicRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHistoryClinic()
    {
        $historyClinic = $this->fakeHistoryClinicData();
        $createdHistoryClinic = $this->historyClinicRepo->create($historyClinic);
        $createdHistoryClinic = $createdHistoryClinic->toArray();
        $this->assertArrayHasKey('id', $createdHistoryClinic);
        $this->assertNotNull($createdHistoryClinic['id'], 'Created HistoryClinic must have id specified');
        $this->assertNotNull(HistoryClinic::find($createdHistoryClinic['id']), 'HistoryClinic with given id must be in DB');
        $this->assertModelData($historyClinic, $createdHistoryClinic);
    }

    /**
     * @test read
     */
    public function testReadHistoryClinic()
    {
        $historyClinic = $this->makeHistoryClinic();
        $dbHistoryClinic = $this->historyClinicRepo->find($historyClinic->id);
        $dbHistoryClinic = $dbHistoryClinic->toArray();
        $this->assertModelData($historyClinic->toArray(), $dbHistoryClinic);
    }

    /**
     * @test update
     */
    public function testUpdateHistoryClinic()
    {
        $historyClinic = $this->makeHistoryClinic();
        $fakeHistoryClinic = $this->fakeHistoryClinicData();
        $updatedHistoryClinic = $this->historyClinicRepo->update($fakeHistoryClinic, $historyClinic->id);
        $this->assertModelData($fakeHistoryClinic, $updatedHistoryClinic->toArray());
        $dbHistoryClinic = $this->historyClinicRepo->find($historyClinic->id);
        $this->assertModelData($fakeHistoryClinic, $dbHistoryClinic->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHistoryClinic()
    {
        $historyClinic = $this->makeHistoryClinic();
        $resp = $this->historyClinicRepo->delete($historyClinic->id);
        $this->assertTrue($resp);
        $this->assertNull(HistoryClinic::find($historyClinic->id), 'HistoryClinic should not exist in DB');
    }
}
