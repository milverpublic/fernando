<?php

namespace App\Repositories;

use App\Models\HistoryClinic;
use InfyOm\Generator\Common\BaseRepository;

class HistoryClinicRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pacient_id',
        'actualizado_por'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HistoryClinic::class;
    }
}
