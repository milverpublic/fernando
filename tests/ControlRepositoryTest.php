<?php

use App\Models\Control;
use App\Repositories\ControlRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControlRepositoryTest extends TestCase
{
    use MakeControlTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ControlRepository
     */
    protected $controlRepo;

    public function setUp()
    {
        parent::setUp();
        $this->controlRepo = App::make(ControlRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateControl()
    {
        $control = $this->fakeControlData();
        $createdControl = $this->controlRepo->create($control);
        $createdControl = $createdControl->toArray();
        $this->assertArrayHasKey('id', $createdControl);
        $this->assertNotNull($createdControl['id'], 'Created Control must have id specified');
        $this->assertNotNull(Control::find($createdControl['id']), 'Control with given id must be in DB');
        $this->assertModelData($control, $createdControl);
    }

    /**
     * @test read
     */
    public function testReadControl()
    {
        $control = $this->makeControl();
        $dbControl = $this->controlRepo->find($control->id);
        $dbControl = $dbControl->toArray();
        $this->assertModelData($control->toArray(), $dbControl);
    }

    /**
     * @test update
     */
    public function testUpdateControl()
    {
        $control = $this->makeControl();
        $fakeControl = $this->fakeControlData();
        $updatedControl = $this->controlRepo->update($fakeControl, $control->id);
        $this->assertModelData($fakeControl, $updatedControl->toArray());
        $dbControl = $this->controlRepo->find($control->id);
        $this->assertModelData($fakeControl, $dbControl->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteControl()
    {
        $control = $this->makeControl();
        $resp = $this->controlRepo->delete($control->id);
        $this->assertTrue($resp);
        $this->assertNull(Control::find($control->id), 'Control should not exist in DB');
    }
}
