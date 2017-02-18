<?php

namespace App\Repositories;

use App\Models\Question;
use InfyOm\Generator\Common\BaseRepository;

class QuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Question::class;
    }
}
