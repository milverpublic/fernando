<?php

use App\Models\Rol;
use App\Repositories\RolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RolRepositoryTest extends TestCase
{
    use MakeRolTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RolRepository
     */
    protected $rolRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rolRepo = App::make(RolRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRol()
    {
        $rol = $this->fakeRolData();
        $createdRol = $this->rolRepo->create($rol);
        $createdRol = $createdRol->toArray();
        $this->assertArrayHasKey('id', $createdRol);
        $this->assertNotNull($createdRol['id'], 'Created Rol must have id specified');
        $this->assertNotNull(Rol::find($createdRol['id']), 'Rol with given id must be in DB');
        $this->assertModelData($rol, $createdRol);
    }

    /**
     * @test read
     */
    public function testReadRol()
    {
        $rol = $this->makeRol();
        $dbRol = $this->rolRepo->find($rol->id);
        $dbRol = $dbRol->toArray();
        $this->assertModelData($rol->toArray(), $dbRol);
    }

    /**
     * @test update
     */
    public function testUpdateRol()
    {
        $rol = $this->makeRol();
        $fakeRol = $this->fakeRolData();
        $updatedRol = $this->rolRepo->update($fakeRol, $rol->id);
        $this->assertModelData($fakeRol, $updatedRol->toArray());
        $dbRol = $this->rolRepo->find($rol->id);
        $this->assertModelData($fakeRol, $dbRol->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRol()
    {
        $rol = $this->makeRol();
        $resp = $this->rolRepo->delete($rol->id);
        $this->assertTrue($resp);
        $this->assertNull(Rol::find($rol->id), 'Rol should not exist in DB');
    }
}
