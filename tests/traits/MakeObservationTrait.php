<?php

use Faker\Factory as Faker;
use App\Models\Observation;
use App\Repositories\ObservationRepository;

trait MakeObservationTrait
{
    /**
     * Create fake instance of Observation and save it in database
     *
     * @param array $observationFields
     * @return Observation
     */
    public function makeObservation($observationFields = [])
    {
        /** @var ObservationRepository $observationRepo */
        $observationRepo = App::make(ObservationRepository::class);
        $theme = $this->fakeObservationData($observationFields);
        return $observationRepo->create($theme);
    }

    /**
     * Get fake instance of Observation
     *
     * @param array $observationFields
     * @return Observation
     */
    public function fakeObservation($observationFields = [])
    {
        return new Observation($this->fakeObservationData($observationFields));
    }

    /**
     * Get fake data of Observation
     *
     * @param array $postFields
     * @return array
     */
    public function fakeObservationData($observationFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'body' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $observationFields);
    }
}
