<?php

use App\Models\ResponseQuestion;
use App\Repositories\ResponseQuestionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResponseQuestionRepositoryTest extends TestCase
{
    use MakeResponseQuestionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResponseQuestionRepository
     */
    protected $responseQuestionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->responseQuestionRepo = App::make(ResponseQuestionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateResponseQuestion()
    {
        $responseQuestion = $this->fakeResponseQuestionData();
        $createdResponseQuestion = $this->responseQuestionRepo->create($responseQuestion);
        $createdResponseQuestion = $createdResponseQuestion->toArray();
        $this->assertArrayHasKey('id', $createdResponseQuestion);
        $this->assertNotNull($createdResponseQuestion['id'], 'Created ResponseQuestion must have id specified');
        $this->assertNotNull(ResponseQuestion::find($createdResponseQuestion['id']), 'ResponseQuestion with given id must be in DB');
        $this->assertModelData($responseQuestion, $createdResponseQuestion);
    }

    /**
     * @test read
     */
    public function testReadResponseQuestion()
    {
        $responseQuestion = $this->makeResponseQuestion();
        $dbResponseQuestion = $this->responseQuestionRepo->find($responseQuestion->id);
        $dbResponseQuestion = $dbResponseQuestion->toArray();
        $this->assertModelData($responseQuestion->toArray(), $dbResponseQuestion);
    }

    /**
     * @test update
     */
    public function testUpdateResponseQuestion()
    {
        $responseQuestion = $this->makeResponseQuestion();
        $fakeResponseQuestion = $this->fakeResponseQuestionData();
        $updatedResponseQuestion = $this->responseQuestionRepo->update($fakeResponseQuestion, $responseQuestion->id);
        $this->assertModelData($fakeResponseQuestion, $updatedResponseQuestion->toArray());
        $dbResponseQuestion = $this->responseQuestionRepo->find($responseQuestion->id);
        $this->assertModelData($fakeResponseQuestion, $dbResponseQuestion->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteResponseQuestion()
    {
        $responseQuestion = $this->makeResponseQuestion();
        $resp = $this->responseQuestionRepo->delete($responseQuestion->id);
        $this->assertTrue($resp);
        $this->assertNull(ResponseQuestion::find($responseQuestion->id), 'ResponseQuestion should not exist in DB');
    }
}
