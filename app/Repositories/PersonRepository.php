<?php

namespace App\Repositories;

use App\Models\Person;
use InfyOm\Generator\Common\BaseRepository;

class PersonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'lastName',
        'address',
        'age',
        'gender'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Person::class;
    }
}
