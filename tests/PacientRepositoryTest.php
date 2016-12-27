<?php

use App\Models\Pacient;
use App\Repositories\PacientRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PacientRepositoryTest extends TestCase
{
    use MakePacientTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PacientRepository
     */
    protected $pacientRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pacientRepo = App::make(PacientRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePacient()
    {
        $pacient = $this->fakePacientData();
        $createdPacient = $this->pacientRepo->create($pacient);
        $createdPacient = $createdPacient->toArray();
        $this->assertArrayHasKey('id', $createdPacient);
        $this->assertNotNull($createdPacient['id'], 'Created Pacient must have id specified');
        $this->assertNotNull(Pacient::find($createdPacient['id']), 'Pacient with given id must be in DB');
        $this->assertModelData($pacient, $createdPacient);
    }

    /**
     * @test read
     */
    public function testReadPacient()
    {
        $pacient = $this->makePacient();
        $dbPacient = $this->pacientRepo->find($pacient->id);
        $dbPacient = $dbPacient->toArray();
        $this->assertModelData($pacient->toArray(), $dbPacient);
    }

    /**
     * @test update
     */
    public function testUpdatePacient()
    {
        $pacient = $this->makePacient();
        $fakePacient = $this->fakePacientData();
        $updatedPacient = $this->pacientRepo->update($fakePacient, $pacient->id);
        $this->assertModelData($fakePacient, $updatedPacient->toArray());
        $dbPacient = $this->pacientRepo->find($pacient->id);
        $this->assertModelData($fakePacient, $dbPacient->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePacient()
    {
        $pacient = $this->makePacient();
        $resp = $this->pacientRepo->delete($pacient->id);
        $this->assertTrue($resp);
        $this->assertNull(Pacient::find($pacient->id), 'Pacient should not exist in DB');
    }
}
