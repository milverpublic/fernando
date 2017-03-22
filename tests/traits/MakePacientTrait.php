<?php

use Faker\Factory as Faker;
use App\Models\Pacient;
use App\Repositories\PacientRepository;

trait MakePacientTrait
{
    /**
     * Create fake instance of Pacient and save it in database
     *
     * @param array $pacientFields
     * @return Pacient
     */
    public function makePacient($pacientFields = [])
    {
        /** @var PacientRepository $pacientRepo */
        $pacientRepo = App::make(PacientRepository::class);
        $theme = $this->fakePacientData($pacientFields);
        return $pacientRepo->create($theme);
    }

    /**
     * Get fake instance of Pacient
     *
     * @param array $pacientFields
     * @return Pacient
     */
    public function fakePacient($pacientFields = [])
    {
        return new Pacient($this->fakePacientData($pacientFields));
    }

    /**
     * Get fake data of Pacient
     *
     * @param array $postFields
     * @return array
     */
    public function fakePacientData($pacientFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'derivado_por' => $fake->word,
            'motivo_consulta' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pacientFields);
    }
}
