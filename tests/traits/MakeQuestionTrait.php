<?php

use Faker\Factory as Faker;
use App\Models\Question;
use App\Repositories\QuestionRepository;

trait MakeQuestionTrait
{
    /**
     * Create fake instance of Question and save it in database
     *
     * @param array $questionFields
     * @return Question
     */
    public function makeQuestion($questionFields = [])
    {
        /** @var QuestionRepository $questionRepo */
        $questionRepo = App::make(QuestionRepository::class);
        $theme = $this->fakeQuestionData($questionFields);
        return $questionRepo->create($theme);
    }

    /**
     * Get fake instance of Question
     *
     * @param array $questionFields
     * @return Question
     */
    public function fakeQuestion($questionFields = [])
    {
        return new Question($this->fakeQuestionData($questionFields));
    }

    /**
     * Get fake data of Question
     *
     * @param array $postFields
     * @return array
     */
    public function fakeQuestionData($questionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $questionFields);
    }
}
