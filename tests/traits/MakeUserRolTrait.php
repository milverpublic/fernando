<?php

use Faker\Factory as Faker;
use App\Models\UserRol;
use App\Repositories\UserRolRepository;

trait MakeUserRolTrait
{
    /**
     * Create fake instance of UserRol and save it in database
     *
     * @param array $userRolFields
     * @return UserRol
     */
    public function makeUserRol($userRolFields = [])
    {
        /** @var UserRolRepository $userRolRepo */
        $userRolRepo = App::make(UserRolRepository::class);
        $theme = $this->fakeUserRolData($userRolFields);
        return $userRolRepo->create($theme);
    }

    /**
     * Get fake instance of UserRol
     *
     * @param array $userRolFields
     * @return UserRol
     */
    public function fakeUserRol($userRolFields = [])
    {
        return new UserRol($this->fakeUserRolData($userRolFields));
    }

    /**
     * Get fake data of UserRol
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserRolData($userRolFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'rol_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $userRolFields);
    }
}
