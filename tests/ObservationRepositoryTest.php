<?php

use App\Models\Observation;
use App\Repositories\ObservationRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObservationRepositoryTest extends TestCase
{
    use MakeObservationTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ObservationRepository
     */
    protected $observationRepo;

    public function setUp()
    {
        parent::setUp();
        $this->observationRepo = App::make(ObservationRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateObservation()
    {
        $observation = $this->fakeObservationData();
        $createdObservation = $this->observationRepo->create($observation);
        $createdObservation = $createdObservation->toArray();
        $this->assertArrayHasKey('id', $createdObservation);
        $this->assertNotNull($createdObservation['id'], 'Created Observation must have id specified');
        $this->assertNotNull(Observation::find($createdObservation['id']), 'Observation with given id must be in DB');
        $this->assertModelData($observation, $createdObservation);
    }

    /**
     * @test read
     */
    public function testReadObservation()
    {
        $observation = $this->makeObservation();
        $dbObservation = $this->observationRepo->find($observation->id);
        $dbObservation = $dbObservation->toArray();
        $this->assertModelData($observation->toArray(), $dbObservation);
    }

    /**
     * @test update
     */
    public function testUpdateObservation()
    {
        $observation = $this->makeObservation();
        $fakeObservation = $this->fakeObservationData();
        $updatedObservation = $this->observationRepo->update($fakeObservation, $observation->id);
        $this->assertModelData($fakeObservation, $updatedObservation->toArray());
        $dbObservation = $this->observationRepo->find($observation->id);
        $this->assertModelData($fakeObservation, $dbObservation->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteObservation()
    {
        $observation = $this->makeObservation();
        $resp = $this->observationRepo->delete($observation->id);
        $this->assertTrue($resp);
        $this->assertNull(Observation::find($observation->id), 'Observation should not exist in DB');
    }
}
