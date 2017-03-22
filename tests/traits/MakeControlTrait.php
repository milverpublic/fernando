<?php

use Faker\Factory as Faker;
use App\Models\Control;
use App\Repositories\ControlRepository;

trait MakeControlTrait
{
    /**
     * Create fake instance of Control and save it in database
     *
     * @param array $controlFields
     * @return Control
     */
    public function makeControl($controlFields = [])
    {
        /** @var ControlRepository $controlRepo */
        $controlRepo = App::make(ControlRepository::class);
        $theme = $this->fakeControlData($controlFields);
        return $controlRepo->create($theme);
    }

    /**
     * Get fake instance of Control
     *
     * @param array $controlFields
     * @return Control
     */
    public function fakeControl($controlFields = [])
    {
        return new Control($this->fakeControlData($controlFields));
    }

    /**
     * Get fake data of Control
     *
     * @param array $postFields
     * @return array
     */
    public function fakeControlData($controlFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecha_trat' => $fake->word,
            'description' => $fake->word,
            'next_trat' => $fake->word,
            'description_next' => $fake->word,
            'status' => $fake->word,
            'accepted' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $controlFields);
    }
}
