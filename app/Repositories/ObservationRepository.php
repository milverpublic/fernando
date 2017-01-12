<?php

namespace App\Repositories;

use App\Models\Observation;
use InfyOm\Generator\Common\BaseRepository;

class ObservationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Observation::class;
    }
}
