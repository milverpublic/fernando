<?php

namespace App\Repositories;

use App\Models\Control;
use InfyOm\Generator\Common\BaseRepository;

class ControlRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_trat',
        'description',
        'next_trat',
        'description_next',
        'status',
        'accepted'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Control::class;
    }
}
