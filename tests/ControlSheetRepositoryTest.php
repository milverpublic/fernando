<?php

use App\Models\ControlSheet;
use App\Repositories\ControlSheetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControlSheetRepositoryTest extends TestCase
{
    use MakeControlSheetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ControlSheetRepository
     */
    protected $controlSheetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->controlSheetRepo = App::make(ControlSheetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateControlSheet()
    {
        $controlSheet = $this->fakeControlSheetData();
        $createdControlSheet = $this->controlSheetRepo->create($controlSheet);
        $createdControlSheet = $createdControlSheet->toArray();
        $this->assertArrayHasKey('id', $createdControlSheet);
        $this->assertNotNull($createdControlSheet['id'], 'Created ControlSheet must have id specified');
        $this->assertNotNull(ControlSheet::find($createdControlSheet['id']), 'ControlSheet with given id must be in DB');
        $this->assertModelData($controlSheet, $createdControlSheet);
    }

    /**
     * @test read
     */
    public function testReadControlSheet()
    {
        $controlSheet = $this->makeControlSheet();
        $dbControlSheet = $this->controlSheetRepo->find($controlSheet->id);
        $dbControlSheet = $dbControlSheet->toArray();
        $this->assertModelData($controlSheet->toArray(), $dbControlSheet);
    }

    /**
     * @test update
     */
    public function testUpdateControlSheet()
    {
        $controlSheet = $this->makeControlSheet();
        $fakeControlSheet = $this->fakeControlSheetData();
        $updatedControlSheet = $this->controlSheetRepo->update($fakeControlSheet, $controlSheet->id);
        $this->assertModelData($fakeControlSheet, $updatedControlSheet->toArray());
        $dbControlSheet = $this->controlSheetRepo->find($controlSheet->id);
        $this->assertModelData($fakeControlSheet, $dbControlSheet->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteControlSheet()
    {
        $controlSheet = $this->makeControlSheet();
        $resp = $this->controlSheetRepo->delete($controlSheet->id);
        $this->assertTrue($resp);
        $this->assertNull(ControlSheet::find($controlSheet->id), 'ControlSheet should not exist in DB');
    }
}
