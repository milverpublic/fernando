<?php

use Faker\Factory as Faker;
use App\Models\ControlSheet;
use App\Repositories\ControlSheetRepository;

trait MakeControlSheetTrait
{
    /**
     * Create fake instance of ControlSheet and save it in database
     *
     * @param array $controlSheetFields
     * @return ControlSheet
     */
    public function makeControlSheet($controlSheetFields = [])
    {
        /** @var ControlSheetRepository $controlSheetRepo */
        $controlSheetRepo = App::make(ControlSheetRepository::class);
        $theme = $this->fakeControlSheetData($controlSheetFields);
        return $controlSheetRepo->create($theme);
    }

    /**
     * Get fake instance of ControlSheet
     *
     * @param array $controlSheetFields
     * @return ControlSheet
     */
    public function fakeControlSheet($controlSheetFields = [])
    {
        return new ControlSheet($this->fakeControlSheetData($controlSheetFields));
    }

    /**
     * Get fake data of ControlSheet
     *
     * @param array $postFields
     * @return array
     */
    public function fakeControlSheetData($controlSheetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fecha_tratamiento' => $fake->word,
            'tratamiento' => $fake->word,
            'tratamiento_next' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $controlSheetFields);
    }
}
