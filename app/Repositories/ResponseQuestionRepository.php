<?php

namespace App\Repositories;

use App\Models\ResponseQuestion;
use InfyOm\Generator\Common\BaseRepository;

class ResponseQuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'history_clinic_id',
        'question_id',
        'reponse_value'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ResponseQuestion::class;
    }

}
