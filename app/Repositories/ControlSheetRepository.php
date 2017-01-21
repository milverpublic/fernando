<?php

namespace App\Repositories;

use App\Models\ControlSheet;
use InfyOm\Generator\Common\BaseRepository;

class ControlSheetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_tratamiento',
        'tratamiento',
        'tratamiento_next',
        'pacient_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ControlSheet::class;
    }
}
