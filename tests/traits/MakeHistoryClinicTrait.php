<?php

use Faker\Factory as Faker;
use App\Models\HistoryClinic;
use App\Repositories\HistoryClinicRepository;

trait MakeHistoryClinicTrait
{
    /**
     * Create fake instance of HistoryClinic and save it in database
     *
     * @param array $historyClinicFields
     * @return HistoryClinic
     */
    public function makeHistoryClinic($historyClinicFields = [])
    {
        /** @var HistoryClinicRepository $historyClinicRepo */
        $historyClinicRepo = App::make(HistoryClinicRepository::class);
        $theme = $this->fakeHistoryClinicData($historyClinicFields);
        return $historyClinicRepo->create($theme);
    }

    /**
     * Get fake instance of HistoryClinic
     *
     * @param array $historyClinicFields
     * @return HistoryClinic
     */
    public function fakeHistoryClinic($historyClinicFields = [])
    {
        return new HistoryClinic($this->fakeHistoryClinicData($historyClinicFields));
    }

    /**
     * Get fake data of HistoryClinic
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHistoryClinicData($historyClinicFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'pacient_id' => $fake->randomDigitNotNull,
            'actualizado_por' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $historyClinicFields);
    }
}
