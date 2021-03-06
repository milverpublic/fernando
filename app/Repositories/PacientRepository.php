<?php

namespace App\Repositories;

use App\Models\Pacient;
use InfyOm\Generator\Common\BaseRepository;

class PacientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'derivado_por',
        'motivo_consulta'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pacient::class;
    }
}
