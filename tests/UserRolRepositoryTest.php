<?php

use App\Models\UserRol;
use App\Repositories\UserRolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRolRepositoryTest extends TestCase
{
    use MakeUserRolTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UserRolRepository
     */
    protected $userRolRepo;

    public function setUp()
    {
        parent::setUp();
        $this->userRolRepo = App::make(UserRolRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUserRol()
    {
        $userRol = $this->fakeUserRolData();
        $createdUserRol = $this->userRolRepo->create($userRol);
        $createdUserRol = $createdUserRol->toArray();
        $this->assertArrayHasKey('id', $createdUserRol);
        $this->assertNotNull($createdUserRol['id'], 'Created UserRol must have id specified');
        $this->assertNotNull(UserRol::find($createdUserRol['id']), 'UserRol with given id must be in DB');
        $this->assertModelData($userRol, $createdUserRol);
    }

    /**
     * @test read
     */
    public function testReadUserRol()
    {
        $userRol = $this->makeUserRol();
        $dbUserRol = $this->userRolRepo->find($userRol->id);
        $dbUserRol = $dbUserRol->toArray();
        $this->assertModelData($userRol->toArray(), $dbUserRol);
    }

    /**
     * @test update
     */
    public function testUpdateUserRol()
    {
        $userRol = $this->makeUserRol();
        $fakeUserRol = $this->fakeUserRolData();
        $updatedUserRol = $this->userRolRepo->update($fakeUserRol, $userRol->id);
        $this->assertModelData($fakeUserRol, $updatedUserRol->toArray());
        $dbUserRol = $this->userRolRepo->find($userRol->id);
        $this->assertModelData($fakeUserRol, $dbUserRol->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUserRol()
    {
        $userRol = $this->makeUserRol();
        $resp = $this->userRolRepo->delete($userRol->id);
        $this->assertTrue($resp);
        $this->assertNull(UserRol::find($userRol->id), 'UserRol should not exist in DB');
    }
}
