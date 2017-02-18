<?php

use Faker\Factory as Faker;
use App\Models\ResponseQuestion;
use App\Repositories\ResponseQuestionRepository;

trait MakeResponseQuestionTrait
{
    /**
     * Create fake instance of ResponseQuestion and save it in database
     *
     * @param array $responseQuestionFields
     * @return ResponseQuestion
     */
    public function makeResponseQuestion($responseQuestionFields = [])
    {
        /** @var ResponseQuestionRepository $responseQuestionRepo */
        $responseQuestionRepo = App::make(ResponseQuestionRepository::class);
        $theme = $this->fakeResponseQuestionData($responseQuestionFields);
        return $responseQuestionRepo->create($theme);
    }

    /**
     * Get fake instance of ResponseQuestion
     *
     * @param array $responseQuestionFields
     * @return ResponseQuestion
     */
    public function fakeResponseQuestion($responseQuestionFields = [])
    {
        return new ResponseQuestion($this->fakeResponseQuestionData($responseQuestionFields));
    }

    /**
     * Get fake data of ResponseQuestion
     *
     * @param array $postFields
     * @return array
     */
    public function fakeResponseQuestionData($responseQuestionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'history_clinic_id' => $fake->randomDigitNotNull,
            'question_id' => $fake->randomDigitNotNull,
            'reponse_value' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $responseQuestionFields);
    }
}
