<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResponseQuestionApiTest extends TestCase
{
    use MakeResponseQuestionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateResponseQuestion()
    {
        $responseQuestion = $this->fakeResponseQuestionData();
        $this->json('POST', '/api/v1/responseQuestions', $responseQuestion);

        $this->assertApiResponse($responseQuestion);
    }

    /**
     * @test
     */
    public function testReadResponseQuestion()
    {
        $responseQuestion = $this->makeResponseQuestion();
        $this->json('GET', '/api/v1/responseQuestions/'.$responseQuestion->id);

        $this->assertApiResponse($responseQuestion->toArray());
    }

    /**
     * @test
     */
    public function testUpdateResponseQuestion()
    {
        $responseQuestion = $this->makeResponseQuestion();
        $editedResponseQuestion = $this->fakeResponseQuestionData();

        $this->json('PUT', '/api/v1/responseQuestions/'.$responseQuestion->id, $editedResponseQuestion);

        $this->assertApiResponse($editedResponseQuestion);
    }

    /**
     * @test
     */
    public function testDeleteResponseQuestion()
    {
        $responseQuestion = $this->makeResponseQuestion();
        $this->json('DELETE', '/api/v1/responseQuestions/'.$responseQuestion->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/responseQuestions/'.$responseQuestion->id);

        $this->assertResponseStatus(404);
    }
}
